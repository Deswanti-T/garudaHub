<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Garuda-Hub</title>
</head>
<body>
    <h1>Daftar Proyek</h1>
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit">Logout</button>
    </form>
    <a href="{{ route('projects.create') }}">+ Proyek Baru</a>

    <table border="1" cellpadding="6">
        <tr>
            <th>Judul</th>
            <th>Klien</th>
            <th>Kategori</th>
            <th>Budget</th>
            <th>Status</th>
            <th>Penawaran</th>
            <th>Aksi</th>
        </tr>
        @forelse ($projects as $p)
        <tr>
            <td>{{ $p->judul }}</td>
            <td>{{ $p->client->nama }}</td>
            <td>{{ $p->kategori }}</td>
            <td>{{ number_format($p->budget_min) }} - {{ number_format($p->budget_max) }}</td>
            <td>{{ $p->status }}</td>
            <td>{{ $p->bids_count }}</td>
            <td><a href="{{ route('projects.show', $p) }}">Detail</a></td>
        </tr>
        @empty
        <tr><td colspan="7">Belum ada proyek.</td></tr>
        @endforelse
    </table>

    {{ $projects->links() }}
</body>
</html>