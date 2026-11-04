@extends('layouts.app')
@section('title', 'Edit Surat Keluar')

@section('content')
<h1>Edit Surat Keluar</h1>

<form action="{{ route('surat-keluar.update', $surat->id) }}" method="POST">
    @csrf
    @method('PUT')

    <p>Nomor Surat:<br>
        <input name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}">
        @error('nomor_surat') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Tanggal:<br>
        <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}">
        @error('tanggal') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Tujuan:<br>
        <input name="tujuan" value="{{ old('tujuan', $surat->tujuan) }}">
        @error('tujuan') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Perihal:<br>
        <input name="perihal" value="{{ old('perihal', $surat->perihal) }}">
        @error('perihal') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <p>Keterangan:<br>
        <textarea name="keterangan">{{ old('keterangan', $surat->keterangan) }}</textarea>
        @error('keterangan') <span style="color:red">{{ $message }}</span> @enderror
    </p>

    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('surat-keluar.index') }}">Batal</a>
</form>
@endsection