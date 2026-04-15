<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Dashboard Sistem Informasi Mushola Nurul Falah
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-4">Ringkasan Keuangan</h3>

                <p>Total Saldo: <strong>Rp {{ number_format($saldo) }}</strong></p>
                <p>Total Pemasukan: <strong>Rp {{ number_format($totalMasuk) }}</strong></p>
                <p>Total Pengeluaran: <strong>Rp {{ number_format($totalKeluar) }}</strong></p>

            </div>

            <div class="bg-white shadow-sm sm:rounded-lg p-6 mt-6">
                <canvas id="chartKeuangan"></canvas>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('chartKeuangan');

        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Pemasukan', 'Pengeluaran'],
                datasets: [{
                    label: 'Data Keuangan',
                    data: [{{ $dataChart['pemasukan'] }}, {{ $dataChart['pengeluaran'] }}],
                    borderWidth: 1
                }]
            }
        });
    </script>
    <div class="bg-white shadow-sm sm:rounded-lg p-6 mt-6">
        <h3 class="text-lg font-bold mb-4">Kegiatan Mendatang</h3>

        @forelse($kegiatans as $k)
            <div class="border-b py-2">
                <p class="font-semibold">{{ $k->nama }}</p>
                <p class="text-sm text-gray-600">{{ $k->tanggal }}</p>
                <p class="text-sm">{{ $k->keterangan }}</p>
            </div>
        @empty
            <p>Tidak ada kegiatan mendatang</p>
        @endforelse
    </div>
</x-app-layout>