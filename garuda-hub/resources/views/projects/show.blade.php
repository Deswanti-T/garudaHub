<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $project->judul }}</title>
    <link rel="stylesheet" href="/app.css">
</head>
<body>
    <a href="{{ route('projects.index') }}">&larr; Kembali</a>
    <h1>{{ $project->judul }}</h1>
    <p>Klien: {{ $project->client->nama }}</p>
    <p>Kategori: {{ $project->kategori }} | Status: {{ $project->status }}</p>
    <p>Budget: {{ number_format($project->budget_min) }} - {{ number_format($project->budget_max) }}</p>
    <p>Batas lelang: {{ $project->batas_lelang->format('d/m/Y') }}</p>
    <p>{{ $project->deskripsi }}</p>

        <h2>Penawaran</h2>
    <ul>
        @forelse ($project->bids as $bid)
        <li>
            {{ $bid->developer->nama }}: Rp {{ number_format($bid->harga) }}, {{ $bid->durasi }} hari
            @if ($bid->is_winner) <strong>(Pemenang)</strong> @endif

            <form method="POST" action="{{ route('bids.winner', $bid) }}" class="inline">
                @csrf @method('PATCH')
                <button type="submit">Pilih pemenang</button>
            </form>
            <form method="POST" action="{{ route('bids.destroy', $bid) }}" class="inline">
                @csrf @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
        @empty
        <li>Belum ada penawaran.</li>
        @endforelse
    </ul>

    <h3>Ajukan Penawaran</h3>
    <form method="POST" action="{{ route('bids.store', $project) }}">
        @csrf
        <p>Harga: <input type="number" name="harga"></p>
        <p>Durasi (hari): <input type="number" name="durasi"></p>
        <p>Proposal: <textarea name="proposal"></textarea></p>
        <button type="submit">Kirim</button>
    </form>
</body>
</html>