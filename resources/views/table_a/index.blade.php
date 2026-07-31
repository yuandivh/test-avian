<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Table A</title>
</head>
<body>
    <div class="p-8">
        <div class="flex justify-evenly">
            {{-- Back to dashboard --}}
            <a href="{{ route('dashboard') }}">
                <button class="px-10 py-3 bg-gray-400 hover:bg-gray-500 rounded-md text-white shadow-md cursor-pointer">Go back</button>
            </a>
            {{-- Create --}}
            <a href="{{ route('table_a.create') }}">
                <button class="px-10 py-3 bg-blue-400 hover:bg-blue-500 rounded-md text-white shadow-md cursor-pointer">Create</button>
            </a>
            {{-- Import Excel --}}
            <button class="px-10 py-3 bg-green-400 hover:bg-green-500 rounded-md text-white shadow-md" id="btnImport">
                <div class="flex justify-center items-center gap-2">
                    <div>
                        Import Excel
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M11.47 2.47a.75.75 0 0 1 1.06 0l7.5 7.5a.75.75 0 1 1-1.06 1.06l-6.22-6.22V21a.75.75 0 0 1-1.5 0V4.81l-6.22 6.22a.75.75 0 1 1-1.06-1.06l7.5-7.5Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </button>
            {{-- Export Excel --}}
            <a href="{{ route('table_a.export') }}">
                <button class="px-10 py-3 bg-green-600 hover:bg-green-700 rounded-md text-white shadow-md cursor-pointer">
                    <div class="flex justify-center items-center gap-2">
                        <div>
                            Export Excel
                        </div>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v16.19l6.22-6.22a.75.75 0 1 1 1.06 1.06l-7.5 7.5a.75.75 0 0 1-1.06 0l-7.5-7.5a.75.75 0 1 1 1.06-1.06l6.22 6.22V3a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </a>
            {{-- Export PDF --}}
            <a href="{{ route('table_a.pdf') }}">
                <button class="px-10 py-3 bg-red-400 hover:bg-red-500 rounded-md text-white shadow-md cursor-pointer">Export PDF</button>
            </a>
        </div>
        <div class="flex justify-center items-center mt-10">
            <div class="overflow-hidden border rounded-xl border-gray-300 shadow-md">
                <table class="w-full text-md text-center table-fixed max-w-7xl">
                    <thead class="sticky top-0 bg-neutral-100 border-b border-gray-300">
                        <tr>
                            <th class="w-1/3 p-3">Kode toko baru</th>
                            <th class="w-1/3 p-3">Kode toko lama</th>
                            <th class="w-1/3 p-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tablea as $data )
                        <tr class="border-b border-gray-400">
                            <td class="p-3">{{ $data->kode_toko_baru }}</td>
                            <td class="p-3">{{ $data->kode_toko_lama ?? "null" }}</td>
                            <td class="p-3">
                                <div class="flex gap-5 justify-evenly items-center">
                                    <a href="{{ route('table_a.edit',['tableaId'=>$data->id]) }}">
                                        <button class="w-20 py-2 bg-yellow-400 hover:bg-yellow-500 rounded-md shadow-md text-white font-semibold cursor-pointer">Edit</button>
                                    </a>
                                    <form action="{{ route('table_a.destroy',['tableaId'=>$data->id]) }}" method="post" class="delete-form">
                                        @csrf
                                        @method('delete')
                                        <button class="w-20 py-2 bg-red-400 hover:bg-red-500 rounded-md shadow-md text-white font-semibold" type="submit">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    @if (session('success-create'))
    <div id="success-create-notif"></div>
    @elseif (session('success-update'))
    <div id="success-update-notif"></div>
    @elseif (session('success-delete'))
    <div id="success-delete-notif"></div>
    @elseif (session('success-import'))
    <div id="success-import-notif"></div>
    @elseif (session('error-import'))
    <div id="error-import-notif"></div>
    @endif
    {{-- Modal Import Excel --}}
    <div id="importModal" class="fixed inset-0 hidden bg-black/50 flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-lg p-6">
            <div class="flex justify-between">
                <h2 class="text-xl font-bold mb-4">
                    Import Excel
                </h2>
                <div class="cursor-pointer" id="btnCloseImport">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                    <path fill-rule="evenodd" d="M5.47 5.47a.75.75 0 0 1 1.06 0L12 10.94l5.47-5.47a.75.75 0 1 1 1.06 1.06L13.06 12l5.47 5.47a.75.75 0 1 1-1.06 1.06L12 13.06l-5.47 5.47a.75.75 0 0 1-1.06-1.06L10.94 12 5.47 6.53a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                    </svg>
                </div>
            </div>
            <p class="text-gray-600 mb-4">
                Upload file Excel sesuai format template.
            </p>
            <div class="bg-gray-100 rounded-lg p-4 mb-4">
                <h3 class="font-semibold">
                    Header yang wajib ada
                </h3>
                <ul class="list-disc ml-5 mt-2">
                    <li>kode_toko_baru</li>
                    <li>kode_toko_lama</li>
                </ul>
            </div>
            <form action="{{ route('table_a.import') }}" method="post" enctype="multipart/form-data">
                @csrf
                <input
                    type="file"
                    name="file"
                    class="mb-5 w-full border rounded p-2"
                    accept=".xlsx,.xls"
                    >
                    <div class="flex justify-end gap-3">
                        <a href="{{ route('table_a.export-template') }}"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300 cursor-pointer">
                            Download Template
                        </a>
                        <button type="submit"
                            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 cursor-pointer">
                            Upload
                        </button>
                    </div>
            </form>
        </div>
    </div>
</body>
</html>
