<x-app-layout>
    <div class="p-6">

        <h2 class="text-lg font-bold mb-4">Tambah Kegiatan</h2>

        <!-- 🔴 ALERT GLOBAL -->
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-3 rounded">
                Harap isi data terlebih dahulu!
            </div>
        @endif

        <form method="POST" action="{{ route('kegiatan.store') }}">
            @csrf

            <div>
                <input type="text" name="nama" value="{{ old('nama') }}" 
                    placeholder="Nama Kegiatan" class="border w-full mb-2">

                @error('nama')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <input type="date" name="tanggal" value="{{ old('tanggal') }}" 
                    class="border w-full mb-2">

                @error('tanggal')
                    <p class="text-red-500 text-sm">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <textarea name="keterangan" class="border w-full mb-2">{{ old('keterangan') }}</textarea>
            </div>

            <button class="bg-green-500 text-white px-4 py-2">
                Simpan
            </button>
        </form>

    </div>
</x-app-layout>