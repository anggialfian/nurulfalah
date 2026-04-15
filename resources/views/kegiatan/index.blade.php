<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Kegiatan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- 🔥 TOP BAR -->
                <div class="flex justify-between items-center mb-4">

                    <!-- Tambah -->
                    <a href="{{ route('kegiatan.create') }}" 
                       class="bg-blue-500 text-white px-4 py-2 rounded flex items-center gap-2">

                        <!-- ICON -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M11 5h2m-1-1v2m-6.586 6.586l9.9-9.9a2 2 0 112.828 2.828l-9.9 9.9H5v-2.828z"/>
                        </svg>

                        Tambah
                    </a>

                </div>

                <!-- 🔥 TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full border text-sm">
                        <tr class="bg-gray-100">
                            <th class="p-2">Nama</th>
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Keterangan</th>
                            <th class="p-2">Aksi</th>
                        </tr>

                        @foreach($kegiatans as $k)
                        <tr class="border-t">
                            <td class="p-2">{{ ucwords(strtolower($k->nama)) }}</td>

                            <td class="p-2">
                                {{ \Carbon\Carbon::parse($k->tanggal)->translatedFormat('d F Y') }}
                            </td>

                            <td class="p-2">{{ $k->keterangan }}</td>

                            <td class="p-2 flex gap-2">

                                <!-- EDIT -->
                                <a href="{{ route('kegiatan.edit', $k->id) }}" class="text-blue-500">
                                    ✏️
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('kegiatan.destroy', $k->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="text-red-500">🗑️</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>