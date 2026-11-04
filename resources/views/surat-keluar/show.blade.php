@extends('layouts.app')
@section('title', 'Detail Surat Keluar')

@section('content')
<h1>Detail Surat Keluar</h1>

<p>Nomor: {{ $surat->nomor_surat }}</p>
<p>Tanggal: {{ $surat->tanggal }}</p>
<p>Tujuan: {{ $surat->tujuan }}</p>
<p>Perihal: {{ $surat->perihal }}</p>
<p>Keterangan: {{ $surat->keterangan ?? '-' }}</p>

<a href="{{ route('surat-keluar.index') }}">Kembali</a>
@endsection