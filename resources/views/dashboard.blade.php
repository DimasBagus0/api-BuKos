@extends('admin') <!-- Extend layout dashboard.blade.php -->

@section('content')
    <h2>dashboard</h2>
    <!-- Tambahkan konten sesuai kebutuhan, seperti tabel untuk menampilkan data pengguna -->
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">bejir</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
    </table>
@endsection
