<x-app-layout>
    <div class="p-6">

        <h2 class="text-lg font-bold mb-4">Edit Kegiatan</h2>

        <form method="POST" action="{{ route('kegiatan.update', $kegiatan->id) }}">
            @csrf
            @method('PUT')

            <input type="text" name="nama" value="{{ $kegiatan->nama }}" class="border w-full mb-2">

            <input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}" class="border w-full mb-2">

            <textarea name="keterangan" class="border w-full mb-2">{{ $kegiatan->keterangan }}</textarea>

            <button class="bg-green-500 text-white px-4 py-2">
                Update
            </button>
        </form>

    </div>
</x-app-layout>