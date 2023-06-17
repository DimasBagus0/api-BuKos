<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product;
use Illuminate\Support\Facades\Storage;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::create([
            'foto_kos' => 'public/fotokos/kos_1.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Budi Santoso',
            'nama_kos'=> 'Kos Bahagia',
            'lokasi_kos'=>'Jalan Pemuda No. 123, Kudus',
            'harga_kos'=>'1500000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_2.png',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Ika Wulandari',
            'nama_kos'=> 'Kos Ceria',
            'lokasi_kos'=>'Jalan Pahlawan No. 45, Kudus',
            'harga_kos'=>'1200000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_3.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Andi Prasetyo',
            'nama_kos'=> 'Kos Sejahtera',
            'lokasi_kos'=>'Jalan Diponegoro No. 78, Kudus',
            'harga_kos'=>'1800000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_4.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rina Indriani',
            'nama_kos'=> 'Kos Harmoni',
            'lokasi_kos'=>'Jalan Kartini No. 56, Kudus',
            'harga_kos'=>'1350000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_5.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Ahmad Malik',
            'nama_kos'=> 'Kos Nyaman',
            'lokasi_kos'=>' Jalan Sudirman No. 321, Kudus',
            'harga_kos'=>'1600000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_6.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Anisa Putri',
            'nama_kos'=> 'Kos Asri',
            'lokasi_kos'=>'Jalan Imam Bonjol No. 89, Kudus',
            'harga_kos'=>' 1250000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_7.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rizky Setiawan',
            'nama_kos'=> 'Kos Cerah',
            'lokasi_kos'=>'Jalan Ahmad Yani No. 12, Kudus',
            'harga_kos'=>' 1400000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_8.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Dewi Cahyani',
            'nama_kos'=> 'Kos Mewah',
            'lokasi_kos'=>'Jalan Gatot Subroto No. 67, Kudus',
            'harga_kos'=>'2000000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_9.jpeg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Dian Pradana',
            'nama_kos'=> 'Kos Sentosa',
            'lokasi_kos'=>'Jalan Veteran No. 34, Kudus',
            'harga_kos'=>'1100000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_10.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rudi Hartanto',
            'nama_kos'=> 'Kos Damai',
            'lokasi_kos'=>'Jalan Dipati Ukur No. 23, Kudus',
            'harga_kos'=>'1300000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_11.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Maya Sari',
            'nama_kos'=> 'Kos Bahagia',
            'lokasi_kos'=>'Jalan Kawi No. 56, Kudus',
            'harga_kos'=>'1500000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_12.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Adi Nugroho',
            'nama_kos'=> 'Kos Asri',
            'lokasi_kos'=>'Jalan Siliwangi No. 78, Kudus',
            'harga_kos'=>'1250000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_13.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rina Susanti',
            'nama_kos'=> 'Kos Sejuk',
            'lokasi_kos'=>'Jalan Riau No. 45, Kudus',
            'harga_kos'=>'1700000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_14.png',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Siti Rahayu',
            'nama_kos'=> 'Kos Damai',
            'lokasi_kos'=>'Jalan Merdeka No. 90, Kudus',
            'harga_kos'=>'1450000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_15.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Rudi Setiawan',
            'nama_kos'=> 'Kos Serasi',
            'lokasi_kos'=>'Jalan A. Yani No. 10, Kudus',
            'harga_kos'=>'1300000'
        ]);
        Product::create([
            'foto_kos' => 'fotokos/kos_16.jpg',
            'foto_pemilik' => 'person/dimas1.png',
            'nama_pemilik' => 'Fitri Wijayanti',
            'nama_kos'=> 'Kos Nyaman',
            'lokasi_kos'=>'Jalan Sudimoro No. 56, Kudus',
            'harga_kos'=>'1600000'
        ]);
    }
}
