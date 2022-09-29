@extends('layouts.main')
@section('container')
{{-- <div class="container mt-5 mb-5 d-flex justify-content-center">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-lg-5 shadow p-5 bg-light" id="form-all">
        <h2 class="h3 text-center mb-4">Tambah Surat</h2>
        <form action="/surat" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="letter_number" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('letter_number') is-invalid @enderror" id="letter_number"
                    name="letter_number" required autofocus>
                @error('letter_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Surat</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="category_id">Kategori:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($category as $c)
                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"
                    required>
                @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ URL::previous() }}" class="btn btn-info mt-3">Kembali</a>
                <button type="submit" class="btn btn-primary mt-3">Tambah</button>
            </div>
        </form>
    </div>
</div> --}}

<div class="container pt-2 pb-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="p-5">
        <h2 class="h3">Arsip Surat - Unggah</h2>
        <p class="mb-4">*Gunakan file berformat .pdf</p>
        <form action="/surat" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="letter_number" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('letter_number') is-invalid @enderror" id="letter_number"
                    name="letter_number" required autofocus>
                @error('letter_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Surat</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required>
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="category_id">Kategori:</label>
                <select class="form-control" id="category_id" name="category_id">
                    @foreach($category as $c)
                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file"
                    required>
                @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ URL::previous() }}" class="btn btn-primary mt-3">Kembali</a>
                <button type="submit" class="btn btn-info mt-3">Tambah</button>
            </div>
        </form>
    </div>
</div>
@endsection