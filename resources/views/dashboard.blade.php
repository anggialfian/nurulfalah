<x-app-layout>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- 🔥 HERO -->
            <div class="relative rounded-lg overflow-hidden shadow h-64">

                <!-- 🔥 BACKGROUND GAMBAR -->
                <img src="{{ asset('images/mushola.jpeg') }}" 
                    class="absolute inset-0 w-full h-full object-cover">

                <!-- 🔥 OVERLAY GELAP -->
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>

                <!-- 🔥 CONTENT -->
                <div class="relative z-10 flex flex-col justify-center h-full p-6 text-white">

                    <h1 class="text-5xl font-extrabold text-white drop-shadow-lg tracking-wide mb-2">
                        Selamat Datang di Sistem Keuangan Mushola
                    </h1>

                    <p class="mb-4">
                        Informasi pemasukan dan pengeluaran selama 30 hari terakhir.
                    </p>

                    <a href="{{ route('laporan') }}" 
                    class="bg-blue-500 px-4 py-2 rounded w-fit">
                        Lihat Laporan
                    </a>

                </div>
            </div>

            <!-- 🔥 KARTU -->
            <div class="grid md:grid-cols-3 gap-4">

                <!-- PEMASUKAN -->
                <div class="bg-white/20 backdrop-blur-md p-4 rounded shadow border-4 border-green-500">
                    <h4 class="text-black-200">Dana Masuk (30 Hari)</h4>
                    <p class="text-green-400 font-bold text-xl mt-2">
                        Rp {{ number_format($pemasukan30) }}
                    </p>
                </div>

                <!-- PENGELUARAN -->
                <div class="bg-white/20 backdrop-blur-md p-4 rounded shadow border-4 border-red-500">
                    <h4 class="text-black-200">Dana Keluar (30 Hari)</h4>
                    <p class="text-red-400 font-bold text-xl mt-2">
                        Rp {{ number_format($pengeluaran30) }}
                    </p>
                </div>

                <!-- SALDO -->
                <div class="bg-white/20 backdrop-blur-md p-4 rounded shadow border-4 border-blue-500">
                    <h4 class="text-black-200">Saldo (30 Hari)</h4>
                    <p class="text-blue-400 font-bold text-xl mt-2">
                        Rp {{ number_format($saldo30) }}
                    </p>
                </div>

            </div>

            <!-- 🔥 RINCIAN -->
            <div class="grid md:grid-cols-2 gap-6">

                <!-- PEMASUKAN -->
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="font-bold mb-3 text-green-600 text-lg text-center">Pemasukan</h3>

                    @foreach($pemasukanList as $t)
                        <div class="border-b py-3 hover:bg-green-50 rounded transition">
                            <p class="font-semibold">{{ ucwords($t->title) }}</p>

                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($t->date)->translatedFormat('d F Y') }}
                            </p>

                            <p class="text-green-600 font-semibold">
                                Rp {{ number_format($t->amount) }}
                            </p>
                        </div>
                    @endforeach
                </div>

                <!-- PENGELUARAN -->
                <div class="bg-white p-6 rounded shadow">
                    <h3 class="font-bold mb-3 text-red-600 text-lg text-center">Pengeluaran</h3>

                    @foreach($pengeluaranList as $t)
                        <div class="border-b py-3 hover:bg-red-50 rounded transition">
                            <p class="font-semibold">{{ ucwords($t->title) }}</p>

                            <p class="text-sm text-gray-500">
                                {{ \Carbon\Carbon::parse($t->date)->translatedFormat('d F Y') }}
                            </p>

                            <p class="text-red-600 font-semibold">
                                Rp {{ number_format($t->amount) }}
                            </p>
                        </div>
                    @endforeach
                </div>

            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <h3 class="text-xl font-bold mb-4">Kegiatan Mendatang</h3>

                @forelse($kegiatans as $k)
                    <div class="py-4 border-b">
                        <p class="text-lg font-semibold">
                            {{ ucwords(strtolower($k->nama)) }}
                        </p>

                        <p class="text-gray-500">
                            {{ \Carbon\Carbon::parse($k->tanggal)->translatedFormat('d F Y') }}
                        </p>

                        <p class="text-sm mt-1">
                            {{ $k->keterangan }}
                        </p>
                    </div>
                @empty
                    <p class="text-gray-500">Tidak ada kegiatan</p>
                @endforelse
            </div>
        </div>
    </div>
    <div class="text-center text-sm text-gray-500 mt-10 mb-4">
    © {{ date('Y') }} Sistem Informasi Keuangan Mushola Nurul Falah
    </div>
</x-app-layout>