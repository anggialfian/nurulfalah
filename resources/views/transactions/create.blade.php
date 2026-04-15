<x-app-layout>
    <x-slot name="header">
        <h2>Tambah Transaksi</h2>
    </x-slot>

    <div class="p-6">
       <form action="{{ route('transactions.store') }}" method="POST">
            @csrf

            <div>
                <label>Judul</label>
                <input type="text" name="title" value="{{ old('title') }}" class="border w-full">
                @error('title')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Tipe</label>
                <select name="type" class="border w-full">
                    <option value="">-- Pilih --</option>
                    <option value="pemasukan">Pemasukan</option>
                    <option value="pengeluaran">Pengeluaran</option>
                </select>
                @error('type')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Jumlah</label>
                <input type="number" name="amount" value="{{ old('amount') }}" class="border w-full">
                @error('amount')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Tanggal</label>
                <input type="date" name="date" value="{{ old('date') }}" class="border w-full">
                @error('date')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label>Keterangan</label>
                <textarea name="description" class="border w-full">{{ old('description') }}</textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2 mt-3">
                Simpan
            </button>
        </form>
    </div>
</x-app-layout>