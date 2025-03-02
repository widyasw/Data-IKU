<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\Support\Str;
use Laravolt\Avatar\Avatar;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the database.
     */
    public function index()
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            ['Index', false],
        ];
        $title = 'All Users';
        $users = User::latest()->get();
        return view('admin.user.index', compact('breadcrumbs', 'title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            ['Create', false],
        ];
        $title = 'Create User';
        $roles = Role::all();
        return view('admin.user.create', compact('breadcrumbs', 'title', 'roles'));
    }

    /**
     * Store a newly created resource in database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'exists:roles,id'],
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'email_verified_at' => now()
            ]);
            $image = 'picture/' . $user->id . '.png';

            $avatar = new Avatar();

            $avatar->create($user->name)->save('uploads/' . $image);

            $user->update(['profile_photo' => $image]);
            $roleName = Role::findOrFail($request->role)->name;
            $user->syncRoles([$roleName]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        return redirect()->route('admin.user.create')->with(['color' => 'bg-success-500', 'message' => __('Berhasil menambahkan data')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            [$user->name, false],
        ];
        $title = $user->name;
        $editable = false;

        $roles = Role::all();

        return view('admin.user.edit', compact('breadcrumbs', 'title', 'user', 'editable', 'roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $breadcrumbs = [
            ['User', true, route('admin.user.index')],
            [$user->name, false],
        ];
        $title = $user->name;
        $editable = true;

        $roles = Role::all();

        return view('admin.user.edit', compact('breadcrumbs', 'title', 'user', 'editable', 'roles'));
    }

    /**
     * Update the specified resource in database.
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'exists:roles,id'],
        ]);

        try {
            DB::beginTransaction();

            if ($validated['password'] == null) {
                unset($validated['password']);
            } else {
                $validated['password'] = Hash::make($validated['password']);
            }

            $user->update($validated);
            $roleName = Role::findOrFail($request->role)->name;
            $user->syncRoles([$roleName]);

            DB::commit();

            return redirect()->route('admin.user.index')->with(['color' => 'bg-success-500', 'message' => __('Berhasil mengubah data')]);
        } catch (Exception $e) {
            DB::rollback();
        }
    }

    /**
     * Remove the specified resource from database.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->back()->with(['color' => 'bg-success-500', 'message' => __('Berhasil menghapus data')]);
    }
}
