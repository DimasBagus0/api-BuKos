@extends('dashboard') <!-- Extend layout dashboard.blade.php -->

@section('content')
    <div class="table-container table-responsive">
        <h2>All Users</h2>
        <!-- Tambahkan konten sesuai kebutuhan, seperti tabel untuk menampilkan data pengguna -->
        <table class="table table-striped table-hover align-middle mt-2">
            <thead class="table table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody class="table table-dark">
                @php
                    $no = 1;
                @endphp

                @foreach ($users as $user)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <!-- Tambahkan data lain sesuai kebutuhan -->
                </tr>
                @endforeach

                <!-- Tambahkan baris lain sesuai data pengguna -->
            </tbody>
        </table>
    </div>
@endsection
