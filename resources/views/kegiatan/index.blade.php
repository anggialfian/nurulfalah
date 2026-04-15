<x-app-layout>
    <div class="p-6">

        <h2 class="text-lg font-bold mb-4">Data Kegiatan</h2>

        <a href="{{ route('kegiatan.create') }}" class="bg-blue-500 text-white px-3 py-2">
            Tambah Kegiatan
        </a>

        <table class="w-full border mt-4">
            <tr>
                <th>Nama</th>
                <th>Jenis</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
            </tr>

            @foreach($kegiatans as $k)
            <tr>
                <td>{{ $k->nama }}</td>
                <td>{{ $k->jenis }}</td>
                <td>{{ $k->tanggal }}</td>
                <td>{{ $k->keterangan }}</td>
            </tr>
            @endforeach

        </table>

    </div>
</x-app-layout>