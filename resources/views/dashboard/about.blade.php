@extends('layouts.main')
@section('container')
<div class="container my-4">
    <h1>About</h1>
    <div class="row">
        <img src="/storage/img/ferdy.jpg" class="rounded col" alt="..." style="max-width: 250px">
        <div class="col">
            <h5>Aplikasi ini dibuat oleh:</h5>
            <table class="table h5 mt-4">
                <tr>
                    <td>Nama</td>
                    <td>: <a href="https://github.com/ferdyhape" class="text-decoration-none">Ferdy Hahan Pradana</a>
                    </td>
                </tr>
                <tr>
                    <td>NIM</td>
                    <td>: 2141764028</td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td>: 29 September 2022</td>
                </tr>
            </table>
        </div>
    </div>
</div>
@endsection