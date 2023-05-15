<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\JenisPengadaan;
use App\Models\Lelang;
use App\Models\Perusahaan;
use App\Models\Portofolio;
use App\Models\User;
use App\Models\Setting;
use Illuminate\Database\Seeder;
use App\Models\ProfilePerusahaan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'nama_panjang' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'email_has_been_verified' => 'terverifikasi',
            'password' => bcrypt('saranawisesa234'),
            'level' => 'superadmin',
        ]);

        User::create([
            'nama_panjang' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_has_been_verified' => 'terverifikasi',
            'password' => bcrypt('saranawisesa234'),
            'level' => 'admin',
        ]);
        
        Setting::create([
            'nama_perusahaan' => 'PT SARANAWISESA PROPERINDO',
            'no_telepon_perusahaan' => '(021) 83794770',
            'email_perusahaan' => 'info@saranawisesa.co.id',
            'alamat_perusahaan' => 'Gedung Sarana Square Lt. 5 Jl. Tebet Barat IV No. 20, Tebet, Jakarta Selatan, Daerah Khusus Ibukota Jakarta.',
            'instagram' => 'nullable',
            'facebook' => 'nullable',
            'twitter' => 'nullable',
            'youtube' => 'nullable',
        ]);

        ProfilePerusahaan::create([
            'sejarah_perusahaan' => 'PT SARANAWISESA PROPERINDO adalah anak perusahaan Perumda Pembangunan Sarana Jaya ( BUMD milik Pemerintah Provinsi DKI Jakarta ) berdiri sejak tanggal 3 Februari 1993 yang bergerak dibidang Property. Seiring dengan perkembangan perusahaan yang semakin pesat maka kami melakukan diversifikasi usaha dengan mengembangkan bisnis baru di bidang Sarana Parkir, Management Properti, Agen Properti, Supplier serta Interior & Landscape.',
            'visi' => 'Menjadi Perusahaan Pengembang yang Terkemuka dan Berkelanjutan di Indonesia',
            'misi' => 'Mengembangkan bisnis properti yang mendukung strategi dan program kerja Pemerintah Provinsi Daerah Khusus Ibukota Jakarta### Menjalin kemitraan strategis untuk menciptakan nilai (value creation) produk dan jasa yang dapat memberikan manfaat kepada masyarakat luas### Berperan aktif dalam mendorong pembangunan kawasan di perkotaan',
        ]);

        Direksi::create([
            'nama_direksi' => 'RONALD BATUBARA',
            'direksi' => '.png',
            'jabatan_direksi' => 'Direktur Umum & Keuangan PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Pelayanan terhadap jasa yang kami berikan berpedoman kepada Objektivitas, Efisiensi, Profesional dan Bertanggung Jawab. Semoga Company Profile ini dapat memberikan wacana dan pertimbangan untuk menjalin kerjasama yang baik dan saling menguntungkan.',
        ]);

        Direksi::create([
            'nama_direksi' => 'HARWIN U. TENGGANO',
            'direksi' => '.png',
            'jabatan_direksi' => 'Direktur Utama PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Dengan karakter perusahaan yang kuat, PT Saranawisesa Properindo yakin MAMPU meningkatkan laba perusahaan secara maksimal yang terukur dan AKUNTABEL, dengan tetap menjunjung tinggi KEJUJURAN dalam bekerja sehingga menjadi perusahaan yang UNGGUL dalam bidangnya. SWP MAJU!',
        ]);

        Direksi::create([
            'nama_direksi' => 'BERNARD YOHANES',
            'direksi' => '.png',
            'jabatan_direksi' => 'Direktur Operasional PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Sebagai anak perusahaan Perumda Pembangunan Sarana Jaya, PT Saranawisesa Properindo berharap dapat memberikan kontribusi maksimal dari sisi Profitabilitas dan terus berkembang menjadi perusahaan yang Membanggakan.',
        ]);
    }
}
