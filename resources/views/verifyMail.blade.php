<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$data['title']}}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin: 0 auto;
            max-width: 600px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.2);
        }
        h1 {
            color: #333;
            font-weight: bold; /* Membuat teks cetak tebal */
            font-size: 24px; /* Ukuran font */
            margin-bottom: 10px; /* Spasi bawah antara judul dan isi */
        }
        p {
            color: #777;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #834bff; /* Warna tombol */
            color: #fff !important; /* Warna teks putih dengan !important */
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-family: 'Poppins', sans-serif; /* Font Poppins */
        }
        .button:hover {
            background-color: #5c35e8; /* Warna tombol saat dihover */
        }
        .image {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <table style="width:100%;">
        <tr>
            <td align="center">
                <div class="container">
                    <h1 style="font-weight: bold;">Halo, {{$data['name']}}!</h1>
                    <p>{{$data['body']}}</p>
                    <a href="{{ $data['url'] }}" class="button">Verifikasi</a>
                    <br>
                    <p>Terima Kasih.</p>
                </div>
            </td>
        </tr>
    </table>
</body>
</html>
