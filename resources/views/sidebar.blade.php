<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body >
        <div class="w-1/5 bg-gray-800 shadow min-h-screen p-4">
            <div class="text-white font-bold text-3xl text-center my-10">
                Test Avian
            </div>
            <nav class="space-y-4">
                <a href="{{ route('dashboard') }}"
                class="text-center hover:bg-gray-500 px-6 py-5 rounded-md cursor-pointer text-white
                font-semibold block {{ request()->routeIs('dashboard') ? 'bg-gray-700' : '' }}">
                    Dashboard
                </a>
                <a href="{{ route('table_a.index') }}"
                class="text-center hover:bg-gray-500 px-6 py-5 rounded-md cursor-pointer text-white
                font-semibold block {{ request()->routeIs('table_a.*') ? 'bg-gray-700' : '' }}">
                    Table A
                </a>
                <a href="{{ route('table_b.index') }}" class="text-center hover:bg-gray-500 px-6 py-5 rounded-md
                 cursor-pointer text-white font-semibold block {{ request()->routeIs('table_b.*') ? 'bg-gray-700' : '' }}">
                    Table B
                </a>
                <a href="{{ route('table_c.index') }}" class="text-center hover:bg-gray-500 px-6 py-5 rounded-md
                 cursor-pointer text-white font-semibold block {{ request()->routeIs('table_c.*') ? 'bg-gray-700' : '' }}">
                    Table C
                </a>
                <a href="{{ route('table_d.index') }}" class=" text-center hover:bg-gray-500 px-6 py-5 rounded-md
                cursor-pointer text-white font-semibold block {{ request()->routeIs('table_d.*') ? 'bg-gray-700' : '' }}">
                    Table D
                </a>
            </nav>
        </div>
</body>
</html>
