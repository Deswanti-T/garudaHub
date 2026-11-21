<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Proyek Baru</title>
</head>
<body>
    <h1>Proyek Baru</h1>

    @if ($errors->any())
        <ul style="color:red">
            @foreach ($errors->all() as $e) <li>{{ $e }}</li> @endforeach
        </ul>
    @endif

    <form method="POST" action="{{ route('projects.store') }}">
        @csrf
        <p>Judul: <input type="text" name="judul" value="{{ old('judul') }}"></p>
        <p>Deskripsi: <textarea name="deskripsi">{{ old('deskripsi') }}</textarea></p>
        <p>Kategori: <input type="text" name="kategori" value="{{ old('kategori') }}"></p>
        <p>Budget min: <input type="number" name="budget_min" value="{{ old('budget_min', 0) }}"></p>
        <p>Budget max: <input type="number" name="budget_max" value="{{ old('budget_max', 0) }}"></p>
        <p>Batas lelang: <input type="date" name="batas_lelang" value="{{ old('batas_lelang') }}"></p>
        <button type="submit">Simpan</button>
    </form>
</body>
</html>