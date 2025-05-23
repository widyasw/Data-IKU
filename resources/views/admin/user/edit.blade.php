@extends('admin.admin_template')

@section('main')
    @include('admin.partials.breadcrumb')
    <div class="card">
        <div class="card-body flex flex-col p-6">
            <header class="flex mb-5 items-center border-b border-slate-100 dark:border-slate-700 pb-5 -mx-6 px-6">
                <div class="flex-1">
                    <div class="card-title text-slate-900 dark:text-white">{{ $title }}</div>
                </div>
            </header>
            <div class="card-text h-full ">
                <form class="space-y-4" method="POST" action="{{ route('admin.user.update', $user->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="input-area relative">
                        <label for="name" class="form-label">Nama <x-required /></label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan Nama"
                            value="{{ $user->name }}" {{ !$editable ? 'readonly' : '' }}>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="input-area relative">
                        <label for="email" class="form-label">Email <x-required /></label>
                        <input type="text" id="email" name="email" class="form-control"
                            placeholder="Masukkan Email" value="{{ $user->email }}" {{ !$editable ? 'readonly' : '' }}>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                    @if ($editable)
                        <div class="input-area relative">
                            <label for="password" class="form-label">Kata Sandi</label>
                            <input type="password" id="password" name="password" class="form-control"
                                placeholder="Masukkan Kata Sandi">
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="input-area relative">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="form-control" placeholder="Masukkan Konfirmasi Kata Sandi">
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    @endif
                    <div>
                        <label for="role" class="form-label">Role <x-required /></label>
                        @if ($editable)
                        <select name="role" id="role" class="select2 form-control w-full mt-2 py-2"
                            {{ !$editable ? 'disabled' : '' }}>
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" @selected($user->hasRole($role->name))
                                    class=" inline-block font-Inter font-normal text-sm text-slate-600">
                                    {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @else
                        <input type="text" class="form-control" placeholder="" value="{{ $user->getRoleNames()[0] }}" readonly>
                        @endif
                    </div>


                    @if ($editable)
                        <button class="btn inline-flex justify-center btn-dark">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
