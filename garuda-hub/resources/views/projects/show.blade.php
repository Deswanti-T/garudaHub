<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $project->judul }}</title>
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
        </li>
        @empty
        <li>Belum ada penawaran.</li>
        @endforelse
    </ul>
</body>
</html>