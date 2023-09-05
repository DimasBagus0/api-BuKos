@extends('dashboard') <!-- Extend layout dashboard.blade.php -->

@section('content')
    <div class="table-container table-responsive">
        <h2>All Products</h2>
        <table class="table table-striped table-hover align-middle">
            <thead class="table-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <!-- Tambahkan kolom lain sesuai kebutuhan -->
                </tr>
            </thead>
            <tbody class="table table-dark">
                @php
                    $no = $products->firstItem();
                @endphp
                @foreach ($products as $product)
                <tr>
                    <th scope="row">{{$no++}}</th>
                    <td>{{$product->nama_kos}}</td>
                    <td>{{$product->harga_kos}}</td>
                    <!-- Tambahkan data lain sesuai kebutuhan -->
                </tr>
                @endforeach
                <!-- Tambahkan baris lain sesuai data semua produk -->
            </tbody>
        </table>
        <div class="d-flex">
            {!! $products->links() !!}
        </div>
    </div>
@endsection
