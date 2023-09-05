@extends('admin') <!-- Extend layout dashboard.blade.php -->

@section('content')
    <div class="table-container table-responsive">
        <h2>Approved Products</h2>
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
                        <td><div class="button-container">
                            <a href="/admin/unapprove/{{$product->id}}" class="btn btn-danger">Tolak</a>
                        </div></td>
                        {{-- <td> --}}
                            {{-- <div class="d-grid gap-2 d-md-block">
                                <form action="/approve/{{$product->id}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Terima</button>
                                </form>
                            </div> --}}
                            {{-- <a href="/admin/unapprove/{{$product->id}}">Tolak</a> --}}
                        {{-- </td> --}}
                        <!-- Tambahkan data lain sesuai kebutuhan -->
                    </tr>
                @endforeach
                <!-- Tambahkan baris lain sesuai data produk yang disetujui -->
            </tbody>
        </table>
    </div>
@endsection
