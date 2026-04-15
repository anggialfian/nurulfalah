<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Transaksi
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- 🔥 TOP BAR -->
                <div class="flex justify-between items-center mb-4">

                    <!-- Tambah -->
                    <a href="{{ route('transactions.create') }}" 
                        class="bg-blue-500 text-white px-4 py-2 rounded flex items-center gap-2">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" 
                            viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                                d="M11 5h2m-1-1v2m-6.586 6.586l9.9-9.9a2 2 0 112.828 2.828l-9.9 9.9H5v-2.828z"/>
                        </svg>

                        Tambah
                    </a>

                    <!-- Filter -->
                    <form method="GET" class="flex gap-2">
                        <select name="sort" class="border p-2 rounded">
                            <option value="">Urutkan</option>
                            <option value="terbaru" {{ request('sort') == 'terbaru' ? 'selected' : '' }}>Terbaru</option>
                            <option value="terlama" {{ request('sort') == 'terlama' ? 'selected' : '' }}>Terlama</option>
                            <option value="terbesar" {{ request('sort') == 'terbesar' ? 'selected' : '' }}>Terbesar</option>
                            <option value="terkecil" {{ request('sort') == 'terkecil' ? 'selected' : '' }}>Terkecil</option>
                            <option value="pemasukan" {{ request('sort') == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                            <option value="pengeluaran" {{ request('sort') == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
                        </select>

                        <button class="bg-gray-500 text-white px-3 rounded">
                            Filter
                        </button>
                    </form>

                </div>

                <!-- 🔥 TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full border text-sm">
                        <tr class="bg-gray-100">
                            <th class="p-2">Judul</th>
                            <th class="p-2">Tipe</th>
                            <th class="p-2">Jumlah</th>
                            <th class="p-2">Tanggal</th>
                            <th class="p-2">Keterangan</th>
                            <th class="p-2">Aksi</th>
                        </tr>

                        @foreach($transactions as $t)
                        <tr class="border-t">
                            <td class="p-2">{{ ucwords(strtolower($t->title)) }}</td>

                            <td class="p-2">
                                @if($t->type == 'pemasukan')
                                    <span class="text-green-600 font-semibold">Pemasukan</span>
                                @else
                                    <span class="text-red-600 font-semibold">Pengeluaran</span>
                                @endif
                            </td>

                            <td class="p-2">Rp {{ number_format($t->amount) }}</td>

                            <td class="p-2">
                                {{ \Carbon\Carbon::parse($t->date)->translatedFormat('d F Y') }}
                            </td>

                            <td class="p-2">{{ $t->description }}</td>

                            <td class="p-2 flex gap-2">

                                <!-- EDIT -->
                                <a href="{{ route('transactions.edit', $t->id) }}" class="text-blue-500">
                                    ✏️
                                </a>

                                <!-- DELETE -->
                                <form action="{{ route('transactions.destroy', $t->id) }}" method="POST">
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