<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Laporan Keuangan
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">

                <!-- 🔥 FILTER -->
                <div class="flex justify-between items-center mb-4">

                    <form method="GET" class="flex gap-2">

                        <select name="bulan" class="border p-2 rounded">
                            <option value="">Semua</option>
                            <option value="1" {{ request('bulan') == '1' ? 'selected' : '' }}>Januari</option>
                            <option value="2" {{ request('bulan') == '2' ? 'selected' : '' }}>Februari</option>
                            <option value="3" {{ request('bulan') == '3' ? 'selected' : '' }}>Maret</option>
                            <option value="4" {{ request('bulan') == '4' ? 'selected' : '' }}>April</option>
                            <option value="5" {{ request('bulan') == '5' ? 'selected' : '' }}>Mei</option>
                            <option value="6" {{ request('bulan') == '6' ? 'selected' : '' }}>Juni</option>
                            <option value="7" {{ request('bulan') == '7' ? 'selected' : '' }}>Juli</option>
                            <option value="8" {{ request('bulan') == '8' ? 'selected' : '' }}>Agustus</option>
                            <option value="9" {{ request('bulan') == '9' ? 'selected' : '' }}>September</option>
                            <option value="10" {{ request('bulan') == '10' ? 'selected' : '' }}>Oktober</option>
                            <option value="11" {{ request('bulan') == '11' ? 'selected' : '' }}>November</option>
                            <option value="12" {{ request('bulan') == '12' ? 'selected' : '' }}>Desember</option>
                        </select>

                        <button type="submit" class="bg-gray-500 text-white px-3 rounded">
                            Filter
                        </button>

                    </form>

                </div>

                <!-- 🔥 TABLE -->
                <div class="overflow-x-auto">
                    <table class="w-full border text-sm">
                        <tr class="bg-gray-100">
                            <th class="p-2">Judul</th>
                            <th class="p-2">Jenis</th>
                            <th class="p-2">Jumlah</th>
                            <th class="p-2">Tanggal</th>
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

                            <td class="p-2">
                                Rp {{ number_format($t->amount) }}
                            </td>

                            <td class="p-2">
                                {{ \Carbon\Carbon::parse($t->date)->translatedFormat('d F Y') }}
                            </td>
                        </tr>
                        @endforeach

                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>