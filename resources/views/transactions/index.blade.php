<x-app-layout>
    <x-slot name="header">
        <h2>Data Transaksi</h2>
    </x-slot>

    <div class="p-6">
        <a href="{{ route('transactions.create') }}" 
           class="bg-blue-500 text-white px-4 py-2 rounded">
            Tambah Transaksi
        </a>

        <table class="mt-4 w-full border">
            <tr class="bg-gray-200">
                <th>Judul</th>
                <th>Tipe</th>
                <th>Jumlah</th>
                <th>Tanggal</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>

            @foreach($transactions as $t)
            <tr>
                <td>{{ $t->title }}</td>
                <td>{{ $t->type }}</td>
                <td>Rp {{ number_format($t->amount) }}</td>
                <td>{{ $t->date }}</td>
                <td>{{ $t->description }}</td>
                <td>
                    <a href="{{ route('transactions.edit', $t->id) }}" class="text-blue-500">
                        Edit
                    </a>

                    <form action="{{ route('transactions.destroy', $t->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</x-app-layout>