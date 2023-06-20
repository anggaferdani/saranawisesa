<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Lelang;
use App\Models\Artikel;
use App\Models\Direksi;
use App\Models\Setting;
use App\Models\Komisaris;
use App\Models\Perusahaan;
use App\Models\Portofolio;
use App\Models\JenisPengadaan;
use Illuminate\Database\Seeder;
use App\Models\ProdukDanLayanan;
use App\Models\ProfilePerusahaan;
use App\Models\SubprodukDanLayanan;

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
            'status_verifikasi' => 'terverifikasi',
            'password' => bcrypt('saranawisesa234'),
            'level' => 'superadmin',
        ]);

        User::create([
            'nama_panjang' => 'Admin',
            'email' => 'admin@gmail.com',
            'status_verifikasi' => 'terverifikasi',
            'password' => bcrypt('saranawisesa234'),
            'level' => 'admin',
        ]);

        Setting::create([
            'isi' => '(021) 83794770',
        ]);
        
        Setting::create([
            'isi' => 'info@saranawisesa.co.id',
        ]);
        
        Setting::create([
            'isi' => 'Gedung Sarana Square Lt. 5 Jl. Tebet Barat IV No. 20, Tebet, Jakarta Selatan, Daerah Khusus Ibukota Jakarta.',
            'link' => 'https://goo.gl/maps/toKUxrt7MXrATq2a9',
        ]);
        
        Setting::create([
            'isi' => 'instagram.com/',
        ]);
        
        Setting::create([
            'isi' => 'facebook.com/',
        ]);
        
        Setting::create([
            'isi' => 'twitter.com/',
        ]);
        
        Setting::create([
            'isi' => 'youtube.com/',
        ]);

        ProfilePerusahaan::create([
            'sejarah_perusahaan' => 'PT SARANAWISESA PROPERINDO adalah anak perusahaan Perumda Pembangunan Sarana Jaya ( BUMD milik Pemerintah Provinsi DKI Jakarta ) berdiri sejak tanggal 3 Februari 1993 yang bergerak dibidang Property. Seiring dengan perkembangan perusahaan yang semakin pesat maka kami melakukan diversifikasi usaha dengan mengembangkan bisnis baru di bidang Sarana Parkir, Management Properti, Agen Properti, Supplier serta Interior & Landscape.',
            'visi' => 'Menjadi Perusahaan Pengembang yang Terkemuka dan Berkelanjutan di Indonesia',
            'misi' => 'Mengembangkan bisnis properti yang mendukung strategi dan program kerja Pemerintah Provinsi Daerah Khusus Ibukota Jakarta# Menjalin kemitraan strategis untuk menciptakan nilai (value creation) produk dan jasa yang dapat memberikan manfaat kepada masyarakat luas# Berperan aktif dalam mendorong pembangunan kawasan di perkotaan',
        ]);

        Direksi::create([
            'nama_direksi' => 'RONALD BATUBARA',
            'direksi' => 'DEFAULT.jpg',
            'jabatan_direksi' => 'Direktur Umum & Keuangan PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Pelayanan terhadap jasa yang kami berikan berpedoman kepada Objektivitas, Efisiensi, Profesional dan Bertanggung Jawab. Semoga Company Profile ini dapat memberikan wacana dan pertimbangan untuk menjalin kerjasama yang baik dan saling menguntungkan.',
        ]);

        Direksi::create([
            'nama_direksi' => 'HARWIN U. TENGGANO',
            'direksi' => 'DEFAULT.jpg',
            'jabatan_direksi' => 'Direktur Utama PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Dengan karakter perusahaan yang kuat, PT Saranawisesa Properindo yakin MAMPU meningkatkan laba perusahaan secara maksimal yang terukur dan AKUNTABEL, dengan tetap menjunjung tinggi KEJUJURAN dalam bekerja sehingga menjadi perusahaan yang UNGGUL dalam bidangnya. SWP MAJU!',
        ]);

        Direksi::create([
            'nama_direksi' => 'BERNARD YOHANES',
            'direksi' => 'DEFAULT.jpg',
            'jabatan_direksi' => 'Direktur Operasional PT Saranawisesa Properindo',
            'pendapat_direksi' => 'Sebagai anak perusahaan Perumda Pembangunan Sarana Jaya, PT Saranawisesa Properindo berharap dapat memberikan kontribusi maksimal dari sisi Profitabilitas dan terus berkembang menjadi perusahaan yang Membanggakan.',
        ]);

        Komisaris::create([
            'nama_komisaris' => 'RONALD BATUBARA',
            'komisaris' => 'DEFAULT.jpg',
            'jabatan_komisaris' => 'Direktur Umum & Keuangan PT Saranawisesa Properindo',
            'pendapat_komisaris' => 'Pelayanan terhadap jasa yang kami berikan berpedoman kepada Objektivitas, Efisiensi, Profesional dan Bertanggung Jawab. Semoga Company Profile ini dapat memberikan wacana dan pertimbangan untuk menjalin kerjasama yang baik dan saling menguntungkan.',
        ]);

        Komisaris::create([
            'nama_komisaris' => 'HARWIN U. TENGGANO',
            'komisaris' => 'DEFAULT.jpg',
            'jabatan_komisaris' => 'Direktur Utama PT Saranawisesa Properindo',
            'pendapat_komisaris' => 'Dengan karakter perusahaan yang kuat, PT Saranawisesa Properindo yakin MAMPU meningkatkan laba perusahaan secara maksimal yang terukur dan AKUNTABEL, dengan tetap menjunjung tinggi KEJUJURAN dalam bekerja sehingga menjadi perusahaan yang UNGGUL dalam bidangnya. SWP MAJU!',
        ]);

        Komisaris::create([
            'nama_komisaris' => 'BERNARD YOHANES',
            'komisaris' => 'DEFAULT.jpg',
            'jabatan_komisaris' => 'Direktur Operasional PT Saranawisesa Properindo',
            'pendapat_komisaris' => 'Sebagai anak perusahaan Perumda Pembangunan Sarana Jaya, PT Saranawisesa Properindo berharap dapat memberikan kontribusi maksimal dari sisi Profitabilitas dan terus berkembang menjadi perusahaan yang Membanggakan.',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'SARANA SQUARE',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'SARANASQUARE.jpg',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'WISE',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'WISE.jpg',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'SARANA PARKING',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'SARANAPARKING.jpg',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'ICT',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'ICT.jpg',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'DIKLAT',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'DIKLAT.jpg',
        ]);

        ProdukDanLayanan::create([
            'judul' => 'WIRA',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'WIRA.jpg',
        ]);

        SubprodukDanLayanan::create([
            'produk_dan_layanan_id' => 1,
            'judul' => 'Subproduk',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'subproduk.jpg',
        ]);

        SubprodukDanLayanan::create([
            'produk_dan_layanan_id' => 1,
            'judul' => 'Subproduk0002',
            'deskripsi' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt quibusdam quod illum doloremque minus ut cupiditate nulla porro aut, laudantium adipisci enim numquam consequuntur impedit laborum, ad repellendus, accusantium velit.',
            'thumbnail' => 'subproduk0002.jpg',
        ]);
    }
}
