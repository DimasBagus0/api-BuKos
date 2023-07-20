<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

     <script type="text/javascript"
     src="https://app.sandbox.midtrans.com/snap/snap.js"
     data-client-key="{{config('midtrans.client_key')}}"></script>

    <title>BuKos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <h1>Bukos Payment</h1>
        <div class="card" style="width: 18rem;">
            <img src="{{ asset('fotokos/kos_1.jpeg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Detail Pesanan</h5>
              <table>

                <tr>
                    <td>Nama</td>
                    <td> : {{$order->name}}</td>
                </tr>

                <tr>
                    <td>Nomor Handphone</td>
                    <td> : {{$order->phone}}</td>
                </tr>

                <tr>
                    <td>Alamat</td>
                    <td> : {{$order->address}}</td>
                </tr>

                <tr>
                    <td>Qty</td>
                    <td> : {{$order->qty}}</td>
                </tr>

                <tr>
                    <td>Total Bayar</td>
                    <td> : {{$order->total_price}}</td>
                </tr>
              </table>
              <button class="btn btn-primary mt-3"id="pay-button">Bayar Sekarang</button>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function () {
          window.snap.pay('{{$snapToken}}', {
            onSuccess: function(result){
              /* You may add your own implementation here */
            //   alert("payment success!"); console.log(result);
                window.location.href = '/invoice/{{$order->id}}'
                console.log(result);
            },
            onPending: function(result){
              /* You may add your own implementation here */
              alert("wating your payment!");
              console.log(result);
            },
            onError: function(result){
              /* You may add your own implementation here */
              alert("payment failed!");
              console.log(result);
            },
            onClose: function(){
              /* You may add your own implementation here */
              alert('you closed the popup without finishing the payment');
            }
          })
        });
      </script>
</body>
</html>