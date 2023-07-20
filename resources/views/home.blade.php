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
            <img src="{{ asset('fotokos/kos_1.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kos Kartika</h5>
              <p class="card-text">Kos kartika, kos nyaman dengan banyak fasilitas, Harga murah dijamin betah</p>
              <form action="/checkout" method="POST">
                @csrf
                <div class="mb-3">
                        <label for="qty" class="form-label">Mau Booking berapa bulan?</label>
                        <input type="number" name="qty" class="form-control" id="qty"
                        placeholder="Jumlah bulan">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Pelanggan</label>
                    <input type="text" name="name" class="form-control" id="name"
                    placeholder="Masukkan Nama!">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No.Handphone</label>
                    <input type="text" name="phone" class="form-control" id="phone"
                    placeholder="Masukkan Nomor Handphone!">
                 </div>
                  <div class="mb-3">
                        <label for="address" class="form-label">Alamat</label>
                        <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Checkout</button></form>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
