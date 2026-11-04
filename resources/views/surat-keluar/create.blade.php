@extends('layouts.app')
@section('title', 'Tambah Surat Keluar')

@section('content')
<h1>Tambah Surat Keluar</h1>

<form action="{{ route('surat-keluar.store') }}" method="POST">
    @csrf
    <p>Nomor Surat: <br>
        <input name="nomor_surat" value="{{ old('nomor_surat') }}">
        @error('nomor_surat') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Tanggal: <br>
        <input type="date" name="tanggal" value="{{ old('tanggal') }}">
        @error('tanggal') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Tujuan:<br>
        <input name="tujuan" value="{{ old('tujuan') }}">
        @error('tujuan') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Perihal:<br>
        <input name="perihal" value="{{ old('perihal') }}">
        @error('perihal') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Keterangan: <br>
        <textarea name="keterangan">{{ old('keterangan') }}</textarea>
        @error('keterangan') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <button type="submit">Simpan</button>
    <a href="{{ route('surat-keluar.index') }}">Batal</a>
</form>
@endsection