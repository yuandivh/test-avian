<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table D Create</title>
</head>
<body>
    <div class="flex  justify-center items-center min-h-screen w-full">
        <div class="w-full max-w-md">
            <div class="font-bold text-2xl mb-5 text-center">
                Create data for Table D
            </div>
            <form action="{{ route('table_d.store') }}" method="post" class="space-y-4 mb-4">
                @csrf
                <input value="{{ old('kode_sales') }}" type="text" name="kode_sales" id="" placeholder="Kode sales" min="1"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('kode_sales')
                border-red-500
                @else
                border-gray-300
                @enderror">
                @error('kode_sales')
                    <p class="text-red-500 text-sm ">
                        {{ $message }}
                    </p>
                @enderror
                <input value="{{ old('nama_sales') }}" type="text" name="nama_sales" id="" placeholder="Nama sales" maxlength="20"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('nama_sales')
                border-red-500
                @else
                border-gray-300
                @enderror
                ">
                @error('nama_sales')
                    <p class="w-full text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror

                <button type="submit" class="py-2 w-full bg-blue-400 hover:bg-blue-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Create</button>
            </form>
            <a href="{{ route('table_d.index') }}">
                <button type="submit" class="py-2 w-full bg-gray-400 hover:bg-gray-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Cancel</button>
            </a>
        </div>
    </div>
</body>
</html>
