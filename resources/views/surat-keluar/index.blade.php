@extends('layouts.app')
@section('title', 'Daftar Surat Keluar')

@section('content')
<h1>Daftar Surat Keluar</h1>
@can('manage-letters')
<a href="{{ route('surat-keluar.create') }}">+ Tambah Surat Keluar</a>
@endcan

@if (session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif

<table border="1" cellpadding="8">
<thead>
    <tr>
        <th>No</th>
        <th>Nomor</th>
        <th>Tanggal</th>
        <th>Tujuan</th>
        <th>Perihal</th>
        <th>Aksi</th>
    </tr>
</thead>
<tbody>
@forelse ($suratKeluar as $surat)
    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $surat->nomor_surat }}</td>
        <td>{{ $surat->tanggal }}</td>
        <td>{{ $surat->tujuan }}</td>
        <td>{{ $surat->perihal }}</td>
        <td>
            <a href="{{ route('surat-keluar.show', $surat->id) }}">Detail</a>
            @can('manage-letters')
            <a href="{{ route('surat-keluar.edit', $surat->id) }}">Edit</a>
            <form action="{{ route('surat-keluar.destroy', $surat->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Hapus surat keluar ini?')">Hapus</button>
            </form>
            @endcan
        </td>
    </tr>
@empty
    <tr><td colspan="6">Belum ada surat keluar.</td></tr>
@endforelse
</tbody>
</table>
@endsection