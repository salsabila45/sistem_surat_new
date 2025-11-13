<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class BeritaSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul' => 'Teknologi AI Mengubah Dunia Pendidikan',
                'slug' => 'teknologi-ai-mengubah-dunia-pendidikan',
                'isi' => 'Artificial Intelligence (AI) telah membawa revolusi dalam dunia pendidikan. Dengan teknologi ini, proses belajar mengajar menjadi lebih personal dan efisien. Sistem AI dapat menganalisis gaya belajar setiap siswa dan menyediakan materi yang sesuai dengan kebutuhan individu.',
                'gambar' => 'ai-education.jpg',
                'penulis_id' => 1,
                'kategori_id' => 1,
                'created_at' => '2024-01-15 09:30:00',
                'updated_at' => '2024-01-15 09:30:00'
            ],
            [
                'judul' => 'Tips Menjaga Kesehatan Mental di Era Digital',
                'slug' => 'tips-menjaga-kesehatan-mental-di-era-digital',
                'isi' => 'Di era digital yang serba cepat, menjaga kesehatan mental menjadi hal yang sangat penting. Beberapa tips yang dapat dilakukan antara lain: membatasi waktu penggunaan media sosial, melakukan meditasi rutin, dan menjaga komunikasi langsung dengan keluarga dan teman.',
                'gambar' => 'mental-health.jpg',
                'penulis_id' => 1,
                'kategori_id' => 2,
                'created_at' => '2024-01-16 14:20:00',
                'updated_at' => '2024-01-16 14:20:00'
            ],
            [
                'judul' => 'Startup Lokal Raih Pendanaan Seri B',
                'slug' => 'startup-lokal-raih-pendanaan-seri-b',
                'isi' => 'Sebuah startup teknologi asal Indonesia berhasil mengumpulkan pendanaan seri B senilai $50 juta. Pendanaan ini akan digunakan untuk ekspansi pasar ke negara-negara Asia Tenggara dan pengembangan produk yang lebih inovatif.',
                'gambar' => 'startup-funding.jpg',
                'penulis_id' => 1,
                'kategori_id' => 3,
                'created_at' => '2024-01-17 11:45:00',
                'updated_at' => '2024-01-17 11:45:00'
            ],
            [
                'judul' => 'Inovasi Terbaru dalam Pengembangan Web',
                'slug' => 'inovasi-terbaru-dalam-pengembangan-web',
                'isi' => 'Framework JavaScript terbaru telah diluncurkan dengan fitur-fitur yang lebih efisien. Framework ini menawarkan performa yang lebih cepat dan pengalaman developer yang lebih baik dengan dukungan TypeScript secara native.',
                'gambar' => 'web-development.jpg',
                'penulis_id' => 1,
                'kategori_id' => 1,
                'created_at' => '2024-01-18 16:10:00',
                'updated_at' => '2024-01-18 16:10:00'
            ],
            [
                'judul' => 'Pentingnya Olahraga Rutin untuk Produktivitas',
                'slug' => 'pentingnya-olahraga-rutin-untuk-produktivitas',
                'isi' => 'Penelitian terbaru menunjukkan bahwa olahraga rutin 30 menit setiap hari dapat meningkatkan produktivitas kerja hingga 40%. Aktivitas fisik membantu meningkatkan sirkulasi darah ke otak dan mengurangi stres.',
                'gambar' => 'olahraga-produktivitas.jpg',
                'penulis_id' => 1,
                'kategori_id' => 2,
                'created_at' => '2024-01-19 08:15:00',
                'updated_at' => '2024-01-19 08:15:00'
            ],
            [
                'judul' => 'Trend E-commerce di Tahun 2024',
                'slug' => 'trend-e-commerce-di-tahun-2024',
                'isi' => 'Tahun 2024 membawa berbagai inovasi dalam dunia e-commerce. Beberapa trend yang patut diperhatikan antara lain: shopping melalui social media, personalized recommendation yang lebih akurat, dan integrasi AI dalam customer service.',
                'gambar' => 'ecommerce-trend.jpg',
                'penulis_id' => 1,
                'kategori_id' => 3,
                'created_at' => '2024-01-20 13:25:00',
                'updated_at' => '2024-01-20 13:25:00'
            ],
            [
                'judul' => 'Keamanan Data di Era Cloud Computing',
                'slug' => 'keamanan-data-di-era-cloud-computing',
                'isi' => 'Dengan semakin banyaknya perusahaan yang beralih ke cloud, keamanan data menjadi concern utama. Implementasi enkripsi end-to-end dan multi-factor authentication menjadi standar baru dalam proteksi data digital.',
                'gambar' => 'cloud-security.jpg',
                'penulis_id' => 1,
                'kategori_id' => 1,
                'created_at' => '2024-01-21 10:40:00',
                'updated_at' => '2024-01-21 10:40:00'
            ],
            [
                'judul' => 'Manfaat Meditasi untuk Kesehatan Jiwa',
                'slug' => 'manfaat-meditasi-untuk-kesehatan-jiwa',
                'isi' => 'Praktik meditasi selama 10 menit setiap hari terbukti dapat mengurangi tingkat kecemasan dan meningkatkan kualitas tidur. Meditasi membantu menenangkan pikiran dan meningkatkan fokus dalam aktivitas sehari-hari.',
                'gambar' => 'meditasi.jpg',
                'penulis_id' => 1,
                'kategori_id' => 2,
                'created_at' => '2024-01-22 15:50:00',
                'updated_at' => '2024-01-22 15:50:00'
            ],
            [
                'judul' => 'Strategi Pemasaran Digital untuk UMKM',
                'slug' => 'strategi-pemasaran-digital-untuk-umkm',
                'isi' => 'UMKM dapat memanfaatkan platform digital untuk menjangkau pasar yang lebih luas. Beberapa strategi yang efektif antara lain: konten marketing di media sosial, SEO untuk website, dan collaboration dengan influencer lokal.',
                'gambar' => 'digital-marketing.jpg',
                'penulis_id' => 1,
                'kategori_id' => 3,
                'created_at' => '2024-01-23 12:05:00',
                'updated_at' => '2024-01-23 12:05:00'
            ],
            [
                'judul' => 'Revolusi IoT dalam Smart Home',
                'slug' => 'revolusi-iot-dalam-smart-home',
                'isi' => 'Internet of Things (IoT) telah mengubah konsep rumah tradisional menjadi smart home. Perangkat seperti smart lighting, smart thermostat, dan security system yang terhubung memberikan kenyamanan dan efisiensi energi bagi penghuni rumah.',
                'gambar' => 'iot-smart-home.jpg',
                'penulis_id' => 1,
                'kategori_id' => 1,
                'created_at' => '2024-01-24 17:30:00',
                'updated_at' => '2024-01-24 17:30:00'
            ]
        ];

        // Using query builder to insert data
        $this->db->table('berita')->insertBatch($data);
    }
}
