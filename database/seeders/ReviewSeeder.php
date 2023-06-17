<?php

namespace Database\Seeders;

use App\Models\Review;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Review::create([
            'nama_review' => 'Dimas Bagus Adityas',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Tanpa BuKos, Saya tidak akan menemukan Kos tepat waktu. Tanpa BuKos saya sangat kesulitan mencari Kos yang nyaman.'
        ]);
        Review::create([
            'nama_review' => 'dimas bagus',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Pelayanan pelanggan sangat buruk. Saya mengirimkan keluhan beberapa kali namun tidak ada respons yang diberikan. Sangat kecewa.'
        ]);
        Review::create([
            'nama_review' => 'Dimas Adty',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Pelayanan ramah dan profesional. Saya mendapatkan bantuan yang sangat baik dari tim customer service dalam memilih Kos yang sesuai dengan kebutuhan saya.'
        ]);
        Review::create([
            'nama_review' => 'Dimazz Adtzz',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Pelayanan sangat lambat. Saya mengirimkan keluhan namun tidak ada tanggapan. Saya sangat kecewa dengan pelayanan pelanggan yang diberikan.'
        ]);
        Review::create([
            'nama_review' => 'Adityas Dimas',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Saya sangat senang dengan layanan yang diberikan oleh website ini. Saya berhasil menemukan kos yang sesuai dengan kebutuhan saya.'
        ]);
        Review::create([
            'nama_review' => 'Dimskuy',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Sistem pencarian yang mudah digunakan dan tampilan website yang menarik membuat pengalaman mencari kos di Bukos menjadi menyenangkan.'
        ]);
        Review::create([
            'nama_review' => 'Bagus Adityas',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Pelayanan pelanggan yang responsif dan ramah. Mereka dengan cepat membantu saya menemukan kos yang sesuai dengan preferensi saya.'
        ]);
        Review::create([
            'nama_review' => 'Dimss',
            'profil_review' => 'person/dimas1.png',
            'review_desc' => 'Beberapa informasi tentang kos tidak sepenuhnya akurat. Harap diperbarui secara berkala untuk menghindari kebingungan bagi calon penyewa.'
        ]);
    }
}
