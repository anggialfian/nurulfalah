<x-app-layout>
    <div class="p-6">

        <h2 class="text-lg font-bold mb-4">Laporan Keuangan</h2>

        <form method="GET" class="mb-4">
            <select name="bulan" class="border p-2">
                <option value="">Semua Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>

            <button type="submit" class="bg-blue-500 text-white px-3 py-1">
                Filter
            </button>
        </form>

        <table class="w-full border">
            <tr class="bg-gray-200">
                <th>Judul</th>
                <th>Jenis</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
            </tr>

            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->title }}</td>
                <td>{{ $t->type }}</td>
                <td>Rp {{ number_format($t->amount) }}</td>
                <td>{{ $t->date }}</td>
            </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>