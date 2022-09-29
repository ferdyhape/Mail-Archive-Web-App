@extends('layouts.main')
@section('container')
<div class="container my-5">
    <h1>Arsip Surat</h1>
    <table class="table h5 mt-4">
        <tr>
            <td>Nomor Surat</td>
            <td>: {{ $surat->letter_number }}
            </td>
        </tr>
        <tr>
            <td>Judul Surat</td>
            <td>: {{ $surat->title }}</td>
        </tr>
        <tr>
            <td>Kategori Surat</td>
            <td>: {{ $surat->category->category_name }}</td>
        </tr>
        <tr>
            <td>Waktu Arsip</td>
            <td>: {{ $surat->archive_time }}</td>
        </tr>
    </table>
    <iframe src="{{asset('storage/pdf-storage/'. $surat->file )}}" class="rounded my-3" width="70%" height="600px">
    </iframe>
    <div class="d-flex justify-content-start">
        <a href="{{ URL::previous() }}" class="btn btn-primary mt-3">Kembali</a>
        <a href="../surat-download/{{ $surat->id }}" class="btn btn-success mt-3">Unduh</a>
        <a href="../surat/{{ $surat->id }}/edit" class="btn btn-warning mt-3">Edit</a>
    </div>
</div>
<style>
    .btn {
        margin: 20px
    }
</style>
@endsection