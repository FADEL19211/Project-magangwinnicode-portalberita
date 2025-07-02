<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\News;
use Illuminate\Support\Carbon;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        News::create([
            'title' => 'Teknologi AI Mengubah Dunia',
            'content' => 'Artificial Intelligence (AI) kini semakin berkembang dan mulai diterapkan di berbagai bidang kehidupan, mulai dari kesehatan, pendidikan, hingga industri kreatif.',
            'category' => 'Business',
            'image' => 'news_images/ai.jpg',
            'created_at' => Carbon::now()->subMinutes(10),
        ]);
        News::create([
            'title' => 'Pemilu Damai 2025',
            'content' => 'Pemilihan umum tahun 2025 berjalan dengan damai dan lancar di seluruh Indonesia, partisipasi masyarakat meningkat signifikan.',
            'category' => 'Politics',
            'image' => 'news_images/pemilu.jpg',
            'created_at' => Carbon::now()->subMinutes(20),
        ]);
        News::create([
            'title' => 'Film Lokal Raih Penghargaan Internasional',
            'content' => 'Film karya anak bangsa berhasil meraih penghargaan di festival film internasional, membanggakan Indonesia di kancah dunia.',
            'category' => 'Entertainment',
            'image' => 'news_images/film.jpg',
            'created_at' => Carbon::now()->subMinutes(30),
        ]);
        // Dummy berita terbaru
        News::create([
            'title' => 'Kejagung Monitor Keberadaan Jurist Tan usai 3 Kali Mangkir, Buka Opsi Panggil lewat Kedutaan',
            'content' => 'Kejaksaan Agung terus memantau keberadaan Jurist Tan yang sudah tiga kali mangkir dari panggilan pemeriksaan.',
            'category' => 'Nasional',
            'image' => 'news_images/kejagung.jpg',
            'created_at' => Carbon::now()->subMinutes(2),
        ]);
        News::create([
            'title' => 'Kalender Juli 2025 Lengkap dengan Hijriah dan Hari Nasional, Apakah Ada Tanggal Merah?',
            'content' => 'Simak daftar lengkap hari libur nasional dan tanggal penting di bulan Juli 2025, termasuk kalender Hijriah.',
            'category' => 'Lifestyle',
            'image' => 'news_images/kalender.jpg',
            'created_at' => Carbon::now()->subMinutes(5),
        ]);
        News::create([
            'title' => 'BSU Tahap II Bakal Dicairkan Kapan? Begini Cara Cek Penerima dan Status Pencairannya',
            'content' => 'Pemerintah akan segera mencairkan Bantuan Subsidi Upah (BSU) tahap II, berikut cara cek penerima dan status pencairan.',
            'category' => 'Nasional',
            'image' => 'news_images/bsu.jpg',
            'created_at' => Carbon::now()->subMinutes(8),
        ]);
    }
}
