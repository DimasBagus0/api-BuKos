@extends('admin') <!-- Extend layout dashboard.blade.php -->

@section('content')
    <div class="table-container table-responsive">
        <h2>Unapproved Products</h2>
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Approve</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody class="table table-dark">
                @php
                    $no = 1;
                @endphp
                @foreach ($products as $product)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $product->nama_kos }}</td>
                        <td>{{ $product->harga_kos }}</td>
                        {{-- <td><a href="/admin/approve/{{ $product->id}}">Terima</a></td> --}}
                        <td><div class="button-container">
                            <a href="/admin/approve/{{ $product->id}}"class="btn btn-success">Terima</a>
                        </div></td>
                        <div class="d-grid gap-2 d-md-block">

                            {{-- <button class="btn btn-primary" type="button">Button</button>
                            <button class="btn btn-primary" type="button">Button</button> --}}
                            {{-- <button type="button" class="btn btn-danger">Tolak</button> --}}
                            {{-- <form action="/approve/{{ $product->id}}" method="post"> --}}



                            {{-- </form> --}}
                        </div>
                        {{-- <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <button type="button" class="btn btn-warning">Middle</button>
                        </div> --}}
                        </td>
                        <!-- Tambahkan data lain sesuai kebutuhan -->
                    </tr>
                @endforeach
                <!-- Tambahkan baris lain sesuai data produk yang belum disetujui -->
            </tbody>
        </table>
    </div>
@endsection
