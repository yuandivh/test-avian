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
    <div class="flex justify-center items-center min-h-screen gap-5">
        <a href="{{ route('table_a.index') }}">
            <div class="bg-gray-100 hover:bg-gray-200 px-25 py-10 rounded-md border-2 border-gray-300 cursor-pointer">Table A</div>
        </a>
        <a href="">
            <div class="bg-gray-100 hover:bg-gray-200 px-25 py-10 rounded-md border-2 border-gray-300 cursor-pointer">Table B</div>
        </a>
        <a href="">
            <div class="bg-gray-100 hover:bg-gray-200 px-25 py-10 rounded-md border-2 border-gray-300 cursor-pointer">Table C</div>
        </a>
        <a href="">
            <div class="bg-gray-100 hover:bg-gray-200 px-25 py-10 rounded-md border-2 border-gray-300 cursor-pointer">Table D</div>
        </a>
    </div>
</body>
</html>
