@extends('layouts.main')
@section('container')
<div class="container pt-2 pb-5">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class=" p-5">
        <h2 class="h3">Edit surat</h2>
        <ul class="mb-4">
            <li>Gunakan file berformat .pdf</li>
            <li>Jika ingin mengganti surat, silahkan input surat baru</li>
        </ul>
        <form action="/surat/{{ $surat->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="old_letter_number" id="old_letter_number" value="{{ $surat->letter_number }}">
            <div class="mb-3">
                <label for="letter_number" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('letter_number') is-invalid @enderror" id="letter_number"
                    name="letter_number" autofocus value="{{ $surat->letter_number }}">
                @error('letter_number')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="title" class="form-label">Judul Surat</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                    required value="{{ $surat->title }}">
                @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="category_id">Kategori:</label>
                <select class="form-control" id="category_id" name="category_id" value="{{ $surat->category->id }}">
                    @foreach($category as $c)
                    @if( $surat->category_id == $c->id)
                    <option value="{{ $c->id }}" selected>{{ $c->category_name }}</option>
                    @else
                    <option value="{{ $c->id }}">{{ $c->category_name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="file" class="form-label">File</label>
                <input class="form-control @error('file') is-invalid @enderror" type="file" id="file" name="file">
                @error('file')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>
            <div class="d-flex justify-content-between">
                <a href="{{ URL::previous() }}" class="btn btn-info mt-3">Kembali</a>
                <button type="submit" class="btn btn-primary mt-3">Edit</button>
            </div>
        </form>
    </div>
</div>
@endsection