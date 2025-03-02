@extends('admin.admin_template')

@section('main')
    <div class="space-y-5">
        <div class="grid grid-cols-4 gap-6 overflow-auto" style="height: 75vh">
            @foreach ($items as $index =>  $iku)
                <a href="{{ route('admin.iku-' . $index + 1 . '.index') }}" class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-full h-full bg-white dark:bg-slate-700 shadow-md rounded-md">
                        <span class="text-4xl font-bold text-black dark:text-white" style="font-size: 100px;">{{ $iku }}</span>
                    </div>
                    <span class="text-xl font-bold text-black mt-2 dark:text-white">IKU {{ $index + 1 }}</span>
                </a>
            @endforeach
        </div>
    </div>
@endsection
