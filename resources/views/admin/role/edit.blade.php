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
                <form class="space-y-4" method="POST" action="{{ route('admin.role.update', $role->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="input-area">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input name="name" type="text" id="name" class="form-control" @disabled(!$editable)
                               placeholder="{{ __('Enter your role name') }}" value="{{ $role->name }}" required>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>

                    <h3 class="font-semibold text-2xl text-black dark:text-white py-5 mt-8">Permission</h3>
                    <div class="grid sm:grid-cols-2 xl:grid-cols-3 gap-7">

                        @foreach ($permissionModules as $key => $permissionModule)
                            <div class="card border border-slate-200">
                                <div class="card-header bg-slate-100 dark:bg-slate-700 !p-3">
                                    <h4 class="p-0 text-lg uppercase">{{ __($key) }}</h4>
                                </div>
                                <!-- Card Body Start -->
                                <div class="p-4">
                                    <ul>
                                        @foreach ($permissionModule as $permission)
                                            <li @class(['permissionCardList', 'singlePermissionCardList' => ($loop->count == 1)])>
                                                <div class="flex items-center justify-between gap-x-3">
                                                    <label for="{{$permission->name}}" class="inputText">
                                                        {{ __($permission->name) }}
                                                    </label>

                                                    <div class="flex items-center mr-2 sm:mr-4 mt-2 space-x-2">
                                                        <label class="relative inline-flex h-6 w-[46px] items-center rounded-full transition-all duration-150 cursor-pointer">
                                                            <input name="permissions[]"
                                                                @disabled(!$editable)
                                                                @checked(in_array($permission->id, $rolePermissions))
                                                                id="{{$permission->name}}"
                                                                value="{{ $permission->id }}"
                                                                type="checkbox"
                                                                class="sr-only peer">
                                                            <div class="w-14 h-6 bg-gray-200 peer-focus:outline-none ring-0 rounded-full peer dark:bg-gray-900 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:z-10 after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary-500"></div>
                                                            <span class="absolute left-1 z-20 text-xs text-white font-Inter font-normal opacity-0 peer-checked:opacity-100">On</span>
                                                            <span class="absolute right-1 z-20 text-xs text-white font-Inter font-normal opacity-100 peer-checked:opacity-0">Off</span>
                                                        </label>
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <!-- Card Body End -->
                            </div>
                        @endforeach
                    </div>

                    @if ($editable)
                        <button class="btn inline-flex justify-center btn-dark">Submit</button>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection
