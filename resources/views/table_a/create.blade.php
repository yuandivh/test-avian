<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="flex  justify-center items-center min-h-screen w-full">
        <div class="w-full max-w-md">
            <div class="font-bold text-2xl mb-5 text-center">
                Create data for Table A
            </div>
            <form action="{{ route('table_a.store') }}" method="post" class="space-y-4 mb-4">
                @csrf
                <input value="{{ old('kode_toko_baru') }}" type="number" name="kode_toko_baru" id="" placeholder="Kode toko baru" min="0"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('kode_toko_baru')
                border-red-500
                @else
                border-gray-300
                @enderror">
                @error('kode_toko_baru')
                    <p class="text-red-500 text-sm ">
                        {{ $message }}
                    </p>
                @enderror
                <input value="{{ old('kode_toko_lama') }}" type="number" name="kode_toko_lama" id="" placeholder="Kode toko lama" min="0"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('kode_toko_lama')
                border-red-500
                @else
                border-gray-300
                @enderror
                ">
                @error('kode_toko_lama')
                    <p class="w-full text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit" class="py-2 w-full bg-blue-400 hover:bg-blue-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Create</button>
            </form>
            <a href="{{ route('table_a.index') }}">
                <button type="submit" class="py-2 w-full bg-gray-400 hover:bg-gray-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Cancel</button>
            </a>
        </div>
    </div>
</body>
</html>
