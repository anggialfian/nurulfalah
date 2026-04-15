<x-app-layout>
    <div class="p-6">
        <h2 class="text-lg font-bold mb-4">Edit Transaksi</h2>

        <form action="{{ route('transactions.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="text" name="title" value="{{ $transaction->title }}" class="border w-full mb-2">

            <select name="type" class="border w-full mb-2">
                <option value="pemasukan" {{ $transaction->type == 'pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                <option value="pengeluaran" {{ $transaction->type == 'pengeluaran' ? 'selected' : '' }}>Pengeluaran</option>
            </select>

            <input type="number" name="amount" value="{{ $transaction->amount }}" class="border w-full mb-2">

            <input type="date" name="date" value="{{ $transaction->date }}" class="border w-full mb-2">

            <textarea name="description" class="border w-full mb-2">{{ $transaction->description }}</textarea>

            <button class="bg-green-500 text-white px-4 py-2">
                Update
            </button>
        </form>
    </div>
</x-app-layout>