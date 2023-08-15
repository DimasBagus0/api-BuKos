<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran Berhasil - Bukos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #0C0C1D;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            background-color: #1E1E30;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 400px;
            margin: 0 auto;
        }
        h1 {
            color: #FFFFFF;
        }
        p {
            color: #CCCCCC;
            margin-top: 10px;
        }
        .button-container {
            margin-top: 20px;
        }
        .button-container a {
            text-decoration: none;
            color: white;
        }
        .button {
            display: inline-block;
            padding: 10px 20px;
            background: linear-gradient(135deg, #834BFF, #6740D9);
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .button:hover {
            transform: translateY(-2px);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Pembayaran Berhasil</h1>
        <p>Terima kasih! Pembayaran Anda telah berhasil.</p>
        <p>Silakan klik tombol di bawah untuk melihat riwayat booking Anda.</p>
        <div class="button-container">
            <a href="http://localhost:3000/profile/riwayatbooking" class="button">Lihat Riwayat Booking</a>
        </div>
    </div>
</body>
</html>
