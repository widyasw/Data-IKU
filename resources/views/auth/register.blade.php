<!DOCTYPE html>
<html lang="en" dir="ltr" class="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    @include('admin.partials.title')
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('backend/css/rt-plugins.css') }}">
    <link href="https://unpkg.com/aos@2.3.0/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="">
    <link rel="stylesheet" href="{{ asset('backend/css/app.css') }}">
    <!-- START : Theme Config js-->
    <script src="{{ asset('backend/js/settings.js') }}" sync></script>
    <!-- END : Theme Config js-->
</head>

<body class=" font-inter skin-default">
    <!-- [if IE]> <p class="browserupgrade">
            You are using an <strong>outdated</strong> browser. Please
            <a href="https://browsehappy.com/">upgrade your browser</a> to improve
            your experience and security.
        </p> <![endif] -->

    <div class="loginwrapper">
        <div class="lg-inner-column">
            @include('auth.partials.section-left')
            <div class="right-column  relative">
                <div class="inner-content h-full flex flex-col bg-white dark:bg-slate-800">
                    <div class="auth-box h-full flex flex-col justify-center">
                        @include('auth.partials.mobile-logo')
                        <div class="text-center 2xl:mb-10 mb-4">
                            <h4 class="font-medium">Sign Up</h4>
                            <div class="text-slate-500 text-base">
                                Create your account to start using Dashcode
                            </div>
                        </div>
                        <!-- BEGIN: Login Form -->
                        <x-auth-session-status class="mb-4" :status="session('status')" />
                        <form class="space-y-4" method="POST" action='{{ route('register') }}'>
                            @csrf
                            <div class="fromGroup">
                                <label class="block capitalize form-label">Name</label>
                                <div class="relative ">
                                    <input type="text" name="name" class="  form-control py-2" placeholder="Name"
                                        value="{{ old('name') }}">
                                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                                </div>
                            </div>
                            <div class="fromGroup">
                                <label class="block capitalize form-label">Email</label>
                                <div class="relative ">
                                    <input type="email" name="email" class="  form-control py-2" placeholder="Email"
                                        value="{{ old('email') }}">
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>
                            </div>
                            <div class="fromGroup">
                                <label class="block capitalize form-label">Passwrod</label>
                                <div class="relative ">
                                    <input type="password" name="password" class="  form-control py-2"
                                        placeholder="Password" value="{{ old('password') }}">
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>
                            </div>
                            <div class="fromGroup">
                                <label class="block capitalize form-label">Confirmation Passwrod</label>
                                <div class="relative ">
                                    <input type="password" name="password_confirmation" class="  form-control py-2"
                                        placeholder="Confirmation Password" value="{{ old('password_confirmation') }}">
                                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                                </div>
                            </div>
                            <button class="btn btn-dark block w-full text-center">Sign up</button>
                        </form>
                        <!-- END: Login Form -->
                        <div
                            class="md:max-w-[345px] mx-auto font-normal text-slate-500 dark:text-slate-400 mt-8 uppercase text-sm">
                            <span>ALREADY REGISTERED?
                            </span>
                            <a href="{{ route('login') }}"
                                class="text-slate-900 dark:text-white font-medium hover:underline">
                                Log In
                            </a>
                        </div>
                    </div>
                    @include('auth.partials.footer')
                </div>
            </div>
        </div>
    </div>

    <!-- scripts -->
    <script src="{{ asset('backend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('backend/js/rt-plugins.js') }}"></script>
    <script src="{{ asset('backend/js/app.js') }}"></script>
</body>

</html>
