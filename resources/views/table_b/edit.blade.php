<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table B Edit</title>
</head>
<body>
    <div class="flex  justify-center items-center min-h-screen w-full">
        <div class="w-full max-w-md">
            <div class="font-bold text-2xl mb-5 text-center">
                Edit data for Table B
            </div>
            <form action="{{ route('table_b.update',['tablebId' => $tableb->id ]) }}" method="post" class="space-y-4 mb-4">
                @csrf
                @method('put')
                <input value="{{ $tableb->kode_toko ?? old('kode_toko') }}" type="number" name="kode_toko" id="" placeholder="Kode toko baru" min="0"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('kode_toko')
                border-red-500
                @else
                border-gray-300
                @enderror">
                @error('kode_toko')
                    <p class="text-red-500 text-sm ">
                        {{ $message }}
                    </p>
                @enderror
                <input value="{{ $tableb->nominal_transaksi?? old('nominal_transaksi') }}" type="number" name="nominal_transaksi" id="" placeholder="Kode toko lama" min="0"
                class="border-2 w-full px-2 py-1 rounded-md
                @error('nominal_transaksi')
                border-red-500
                @else
                border-gray-300
                @enderror
                ">
                @error('nominal_transaksi')
                    <p class="w-full text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
                <button type="submit" class="py-2 w-full bg-yellow-400 hover:bg-yellow-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Update</button>
            </form>
            <a href="{{ route('table_b.index') }}">
                <button type="submit" class="py-2 w-full bg-gray-400 hover:bg-gray-500 cursor-pointer shadow-md text-white rounded-md font-semibold" >Cancel</button>
            </a>
        </div>
    </div>
</body>
</html>
