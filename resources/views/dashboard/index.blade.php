@extends('layouts.main')
@section('container')
<div class="container mb-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card-header py-3 d-flex justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary fs-3"><strong>APLIKASI PENGARSIPAN SURAT</strong></h6>
        <div class="d-flex">
            <div class="btn-group mr-2" role="group" aria-label="First group">
                <button type="button" class="btn btn-primary"><a class="text-decoration-none text-white"
                        href="../surat/create">Arsipkan Surat</a></button>
            </div>
        </div>
    </div>
    <div class="card-body mb-5">
        <table id="datatables" class="table table-responsive table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Nomor Surat</th>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th style="width: 270">Waktu Arsip</th>
                    <th class="text-center" style="width: 137.5312px">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($surat as $s)
                <tr>
                    <td>{{ $s->letter_number }}</td>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->category->category_name }}</td>
                    <td>{{ $s->archive_time }}</td>
                    <td class="d-flex justify-content-evenly">
                        <a href="../surat/{{ $s->id }}" class="badge bg-success"><i class="bi bi-eye-fill"
                                style="font-size: 18px;"></i></a>
                        <a href="../surat-download/{{ $s->id }}" class="badge bg-primary"><i class="bi bi-download"
                                style="font-size: 18px;"></i></a>
                        <form action="surat/{{ $s->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0"
                                onclick="return confirm('Ingin menghapus {{ $s->title }} ?')"><i class="bi bi-trash"
                                    style="font-size: 18px;"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .alert {
        position: absolute;
        right: 30%;
        margin-top: 45px;
    }
</style>
@endsection