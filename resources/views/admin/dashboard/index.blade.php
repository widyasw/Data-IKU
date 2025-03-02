@extends('admin.admin_template')

@section('main')
    {{-- <div class="space-y-5">
        <div class="grid grid-cols-4 gap-6 overflow-auto" style="height: 75vh">
            @foreach ($items as $index =>  $iku)
                @can("iku". $index+1 . ".read")
                    <a href="{{ route('admin.iku-' . $index + 1 . '.index') }}" class="flex flex-col items-center">
                        <div class="flex items-center justify-center w-full h-full bg-white dark:bg-slate-700 shadow-md rounded-md">
                            <span class="text-4xl font-bold text-black dark:text-white" style="font-size: 100px;">{{ $iku }}</span>
                        </div>
                        <span class="text-xl font-bold text-black mt-2 dark:text-white">IKU {{ $index + 1 }}</span>
                    </a>
                @endcan
            @endforeach
        </div>
    </div> --}}

    <div class="space-y-5">
        @php
            $validItems = [];
            foreach ($items as $index => $iku) {
                if (auth()->user()->can("iku " . ($index + 1) . " lihat")) {
                    $validItems[] = ['index' => $index + 1, 'iku' => $iku];
                }
            }
        @endphp

        <div class="grid grid-cols-4 grid-rows-2 gap-6 overflow-auto" style="height: 75vh">
            @foreach ($validItems as $item)
                <a href="{{ route('admin.iku-' . $item['index'] . '.index') }}" class="flex flex-col items-center">
                    <div class="flex items-center justify-center w-full h-full bg-white dark:bg-slate-700 shadow-md rounded-md">
                        <span class="text-4xl font-bold text-black dark:text-white" style="font-size: 100px;">{{ $item['iku'] }}</span>
                    </div>
                    <span class="text-xl font-bold text-black mt-2 dark:text-white">IKU {{ $item['index'] }}</span>
                </a>
            @endforeach

            {{-- Tambahkan slot kosong jika data yang lolos kurang dari 8 --}}
            @for ($i = count($validItems); $i < 8; $i++)
                <div></div>
            @endfor
        </div>
    </div>

@endsection
