@extends('layouts.main')
@section('container')
<div class="container mt-5 mb-5 d-flex justify-content-center">
    @if ($message = Session::get('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ $message }}
        <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif
    <div class="col-lg-5 shadow p-5 bg-light" id="form-all">
        <h2 class="h3 text-center mb-4">Tambah surat</h2>
        <form action="/surat/{{ $surat->id }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="letter_number" class="form-label">Nomor Surat</label>
                <input type="text" class="form-control @error('letter_number') is-invalid @enderror" id="letter_number"
                    name="letter_number" required autofocus value="{{ $surat->letter_number }}">
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
            <div class="d-flex justify-content-between">
                <a href="{{ URL::previous() }}" class="btn btn-info mt-3">Kembali</a>
                <button type="submit" class="btn btn-primary mt-3">Edit</button>
            </div>
        </form>
    </div>
</div>

{{-- <script>
    function previewImage() {
        const image = document.querySelector('#gambar');
        const imgPreview = document.querySelector('.img-preview')

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script> --}}
@endsection