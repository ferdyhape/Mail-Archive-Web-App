@extends('layouts.main')
@section('container')
<div class="container">
    <div class="card-body">
        <table class="table table-bordered table-hover table-striped">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Kategori</th>
                    <th>Waktu Arsip</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>

            <tbody>
                @foreach($surat as $s)
                <tr>
                    <td>{{ $s->title }}</td>
                    <td>{{ $s->category->category_name }}</td>
                    <td>{{ $s->archive_time }}</td>
                    <td class="d-flex justify-content-evenly">
                        <a href="surat/{{ $s->id }}" class="badge bg-success"><i class="bi bi-eye-fill"
                                style="font-size: 18px;"></i></a>
                        <a href="surat/{{ $s->id }}/edit" class="badge bg-warning"><i class="bi bi-pencil-square"
                                style="font-size: 18px;"></i></a>
                        <form action="surat/{{ $s->id }}" method="POST">
                            @method('delete')
                            @csrf
                            <button class="badge bg-danger border-0" onclick="return confirm('beneran mau hapus?')"><i
                                    class="bi bi-trash" style="font-size: 18px;"></i></button>
                        </form>
                        <!-- <a href="surat/{{ $s->id }}" class="badge bg-warning"><i class="bi bi-pencil-square" style="font-size: 18px;"></i></a> -->
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
{{-- start code for page --}}