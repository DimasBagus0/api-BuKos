<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BuKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Bukos Payment</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset($product->foto_kos) }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">{{$product->nama_kos}}</h5>
              <p class="card-text">{{$product->alamat_kos}}</p>
              {{-- <p class="card-text">Rp. {{$product->harga_kos}}</p> --}}
              <form action="/checkout" method="POST">
                @csrf
                <div hidden class="mb-3">
                    <label for="foto_kos" class="form-label"></label>
                    <input type="text" name="foto_kos" value="{{old('foto_kos', $product->foto_kos)}}" class="form-control" id="name"
                    placeholder="Masukkan Nama!" >
                </div>
                <div class="mb-3">
                        <label for="qty" class="form-label">Mau Booking berapa bulan?</label>
                        <input type="number" required name="qty" class="form-control" id="qty"
                        placeholder="Jumlah bulan">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="name" value="{{old('name', $product->user->name)}}" class="form-control" id="name"
                    placeholder="Masukkan Nama!" >
                </div>
                <div class="mb-3">
                    <label for="harga_kos" class="form-label">Harga Kos</label>
                    <input type="number" name="harga_kos" value="{{old('harga_kos', $product->harga_kos)}}" class="form-control" id="harga_kos"
                    placeholder="Masukkan Nama!">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No.Handphone</label>
                    <input type="text"  value="{{old('phone', $product->user->phone)}}" name="phone" class="form-control" id="phone"
                    placeholder="Masukkan Nomor Handphone!">
                 </div>
                  <div class="mb-3">
                        <label for="tipe_kamar" class="form-label">Tipe Kamar</label>
                        <input type="text" name="tipe_kamar"  class="form-control" value="{{old('tipe_kamar',$product->tipe_kamar)}}" id="tipe_kamar" rows="3"></input type="text">
                  </div>
                  <button type="submit" class="btn btn-primary">Checkout</button></form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
