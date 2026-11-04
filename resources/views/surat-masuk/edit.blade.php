@extends('layouts.app')
@section('title', 'Edit Surat Masuk')

@section('content')
<h1>Edit Surat Masuk</h1>
<form action="{{ route('surat-masuk.update', $surat->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    <p>Nomor Surat:<br></p>
    <input name="nomor_surat" value="{{ old('nomor_surat', $surat->nomor_surat) }}">
    @error('nomor_surat') <span style="color:red">{{ $message }}</span> @enderror
    
    <p>Tanggal:<br></p>
    <input type="date" name="tanggal" value="{{ old('tanggal', $surat->tanggal) }}">
    @error('tanggal') <span style="color:red">{{ $message }}</span> @enderror
    
    <p>Pengirim:<br></p>
    <input name="pengirim" value="{{ old('pengirim', $surat->pengirim) }}">
    @error('pengirim') <span style="color:red">{{ $message }}</span> @enderror
    
    <p>Perihal:<br></p>
    <input name="perihal" value="{{ old('perihal', $surat->perihal) }}">
    @error('perihal') <span style="color:red">{{ $message }}</span> @enderror
    
    <p>Keterangan:<br></p>
    <textarea name="keterangan">{{ old('keterangan', $surat->keterangan) }}</textarea>
    @error('keterangan') <span style="color:red">{{ $message }}</span> @enderror
    
    <br><br>
    <button type="submit">Simpan Perubahan</button>
    <a href="{{ route('surat-masuk.index') }}">Batal</a>
</form>
@endsection