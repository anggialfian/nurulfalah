<x-app-layout>
    <div class="p-6">

        <h2 class="text-lg font-bold mb-4">Tambah Kegiatan</h2>

        <form method="POST" action="{{ route('kegiatan.store') }}">
            @csrf

            <input type="text" name="nama" placeholder="Nama Kegiatan" class="border w-full mb-2">

            <input type="date" name="tanggal" class="border w-full mb-2">

            <textarea name="keterangan" placeholder="Keterangan" class="border w-full mb-2"></textarea>

            <button class="bg-green-500 text-white px-4 py-2">
                Simpan
            </button>
        </form>

    </div>
</x-app-layout>