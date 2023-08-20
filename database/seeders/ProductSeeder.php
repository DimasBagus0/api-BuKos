<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Auth::loginUsingId(1);
        Product::create([
            'foto_kos' => 'fotokos/kos_1.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Budi Santoso',
            'nama_kos'=> 'Kos Jawir',
            'alamat_kos'=>'Jalan Pemuda No. 123, Kudus',
            'harga_kos'=> 1500000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar: 3m x 4m, Tipe tempat tidur: Single bed, AC: Ya, Kamar mandi: Dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, TV',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Bacin'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_2.png',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Ika Wulandari',
            'nama_kos'=> 'Kos Ceria',
            'alamat_kos'=>'Jalan Pahlawan No. 45, Kudus',
            'harga_kos'=>  1200000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4m, Double bed, AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Wi-Fi',
            'fasilitas_umum'=> 'Ruang makan bersama, Laundry self-service, Taman',
            'peraturan_kamar'=> 'Tidak ada makanan di dalam kamar, Mengganti seprai secara berkala',
            'peraturan_kos'=> 'Tidak ada tamu yang diperbolehkan masuk setelah pukul 22.00',
            'tipe_kamar'=> 'Campuran',
            'lokasi_kos'=>'Bacin'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_3.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Andi Prasetyo',
            'nama_kos'=> 'Kos Sejahtera',
            'alamat_kos'=>'Jalan Diponegoro No. 78, Kudus',
            'harga_kos'=>1800000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 4m, Single bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putri',
            'lokasi_kos'=>'Besito'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_4.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rina Indriani',
            'nama_kos'=> 'Kos Harmoni',
            'alamat_kos'=>'Jalan Kartini No. 56, Kudus',
            'harga_kos'=>1350000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 3.5m, Single bed, Tidak ada AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Kipas angin',
            'fasilitas_umum'=> ' Ruang makan bersama, Area cuci dan jemur, Taman',
            'peraturan_kamar'=> 'Mengunci pintu saat keluar, Menjaga kebersihan pribadi',
            'peraturan_kos'=> 'Tidak membawa tamu ke dalam kos, Menggunakan fasilitas dengan bijak',
            'tipe_kamar'=> 'Putri',
            'lokasi_kos'=>'Besito'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_5.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Ahmad Malik',
            'nama_kos'=> 'Kos Nyaman',
            'alamat_kos'=>' Jalan Sudirman No. 321, Kudus',
            'harga_kos'=>1600000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4.5m, Double bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Campuran',
            'lokasi_kos'=>'Demaan'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_6.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Anisa Putri',
            'nama_kos'=> 'Kos Asri',
            'alamat_kos'=>'Jalan Imam Bonjol No. 89, Kudus',
            'harga_kos'=> 1250000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 4m, Single bed, AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Wi-Fi',
            'fasilitas_umum'=> 'Ruang makan bersama, Laundry self-service, Taman',
            'peraturan_kamar'=> 'Tidak ada makanan di dalam kamar, Mengganti seprai secara berkala',
            'peraturan_kos'=> 'Tidak ada tamu yang diperbolehkan masuk setelah pukul 22.00',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Demaan'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_7.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rizky Setiawan',
            'nama_kos'=> 'Kos Cerah',
            'alamat_kos'=>'Jalan Ahmad Yani No. 12, Kudus',
            'harga_kos'=> 1400000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4m, Single bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Jepang'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_8.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Dewi Cahyani',
            'nama_kos'=> 'Kos Mewah',
            'alamat_kos'=>'Jalan Gatot Subroto No. 67, Kudus',
            'harga_kos'=>2000000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 3.5m, Single bed, Tidak ada AC, Kamar mandi luar',
            'fasilitas_kamar'=> ' Lemari pakaian, Meja dan kursi, Kipas angin',
            'fasilitas_umum'=> ' Ruang makan bersama, Area cuci dan jemur, Taman',
            'peraturan_kamar'=> 'Mengunci pintu saat keluar, Menjaga kebersihan pribadi',
            'peraturan_kos'=> 'Tidak membawa tamu ke dalam kos, Menggunakan fasilitas dengan bijak',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Jepang'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_9.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Dian Pradana',
            'nama_kos'=> 'Kos Sentosa',
            'alamat_kos'=>'Jalan Veteran No. 34, Kudus',
            'harga_kos'=>1100000.00,
            'spesifikasi_kamar'=> ' Ukuran kamar 4m x 4.5m, Double bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> ' Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Campuran',
            'lokasi_kos'=>'Getas'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_10.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rudi Hartanto',
            'nama_kos'=> 'Kos Damai',
            'alamat_kos'=>'Jalan Dipati Ukur No. 23, Kudus',
            'harga_kos'=>1300000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 4m, Single bed, AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Wi-Fi',
            'fasilitas_umum'=> 'Ruang makan bersama, Laundry self-service, Taman',
            'peraturan_kamar'=> 'Tidak ada makanan di dalam kamar, Mengganti seprai secara berkala',
            'peraturan_kos'=> 'Tidak ada tamu yang diperbolehkan masuk setelah pukul 22.00',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Getas'

        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_11.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Maya Sari',
            'nama_kos'=> 'Kos Bahagia',
            'alamat_kos'=>'Jalan Kawi No. 56, Kudus',
            'harga_kos'=>1500000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4m, Single bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Ruang makan bersama, Area parkir, Tempat jemur',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Ngembal'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_12.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Adi Nugroho',
            'nama_kos'=> 'Kos Asri',
            'alamat_kos'=>'Jalan Siliwangi No. 78, Kudus',
            'harga_kos'=>1250000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 3.5m, Single bed, Tidak ada AC, Kamar mandi luar',
            'fasilitas_kamar'=> ' Lemari pakaian, Meja dan kursi, Kipas angin',
            'fasilitas_umum'=> 'Area parkir, Area olahraga, Ruang tamu bersama',
            'peraturan_kamar'=> 'Mengunci pintu saat keluar, Menjaga kebersihan pribadi',
            'peraturan_kos'=> 'Tidak membawa tamu ke dalam kos, Menggunakan fasilitas dengan bijak',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Ngembal'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_13.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rina Susanti',
            'nama_kos'=> 'Kos Sejuk',
            'alamat_kos'=>'Jalan Riau No. 45, Kudus',
            'harga_kos'=>1700000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4.5m, Double bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putri',
            'lokasi_kos'=>'Nganguk'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_14.png',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Siti Rahayu',
            'nama_kos'=> 'Kos Damai',
            'alamat_kos'=>'Jalan Merdeka No. 90, Kudus',
            'harga_kos'=>1450000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 4m, Single bed, AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Wi-Fi',
            'fasilitas_umum'=> 'Ruang makan bersama, Area olahraga, Ruang tamu bersama',
            'peraturan_kamar'=> 'Mengunci pintu saat keluar, Menjaga kebersihan pribadi',
            'peraturan_kos'=> 'Tidak membawa tamu ke dalam kos, Menggunakan fasilitas dengan bijak',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Nganguk'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_15.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rudi Setiawan',
            'nama_kos'=> 'Kos Serasi',
            'alamat_kos'=>'Jalan A. Yani No. 10, Kudus',
            'harga_kos'=>1300000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 3.5m x 3.5m, Single bed, Tidak ada AC, Kamar mandi luar',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, Kipas angin',
            'fasilitas_umum'=> 'Dapur bersama, Ruang tamu bersama, Area parkir',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putra',
            'lokasi_kos'=>'Purwosari'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_16.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Fitri Wijayanti',
            'nama_kos'=> 'Kos Nyaman',
            'alamat_kos'=>'Jalan Sudimoro No. 56, Kudus',
            'harga_kos'=>1600000.00,
            'spesifikasi_kamar'=> 'Ukuran kamar 4m x 4m, Single bed, AC, Kamar mandi dalam',
            'fasilitas_kamar'=> 'Lemari pakaian, Meja dan kursi, AC, TV',
            'fasilitas_umum'=> 'Area parkir, Tempat jemur, Ruang tamu bersama',
            'peraturan_kamar'=> 'Tidak merokok di dalam kamar, Mengunci pintu saat keluar',
            'peraturan_kos'=> 'Tidak membawa hewan peliharaan, Jaga kebersihan lingkungan',
            'tipe_kamar'=> 'Putri',
            'lokasi_kos'=>'Purwosari'
        ]);
        $products = Product::all();

        foreach ($products as $product) {
            $formattedPrice = number_format($product->harga_kos, 0, ',', '.');

            echo "Nama Kos: $product->nama_kos\n";
            echo "Harga Kos: Rp $formattedPrice\n\n";
        }
    }
}
