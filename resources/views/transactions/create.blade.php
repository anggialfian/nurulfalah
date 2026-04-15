<x-app-layout>
    <x-slot name="header">
        <h2>Tambah Transaksi</h2>
    </x-slot>

    <div class="p-6">
        <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div>
                <label>Judul</label>
                <input type="text" name="title" class="border w-full">
            </div>

            <div>
                <label>Tipe</label>
                <select name="type" class="border w-full">
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
            </div>

            <div>
                <label>Jumlah</label>
                <input type="number" name="amount" class="border w-full">
            </div>

            <div>
                <label>Tanggal</label>
                <input type="date" name="date" class="border w-full">
            </div>

            <div>
                <label>Keterangan</label>
                <textarea name="description" class="border w-full"></textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 mt-3">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>