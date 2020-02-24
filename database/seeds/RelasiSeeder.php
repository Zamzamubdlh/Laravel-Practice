<?php

use Illuminate\Database\Seeder;
use App\Dosen;
use App\Mahasiswa;
use App\Wali;
use App\Hobi;

class RelasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menghapus Semua Smple Data
        DB::table('dosens')->delete();
        DB::table('mahasiswas')->delete();
        DB::table('walis')->delete();
        DB::table('hobis')->delete();
        DB::table('mahasiswa_hobi')->delete();

        // Membuat data Dosen
        $dosen = Dosen::create([
            'nama' => 'Zamzam Ubaidilah',
            'nipd' => '1234567890'
        ]);
        $this->command->info('Data Dosen Berhasil dibuat');

        // Membuat data Mahasiswa
        $riz = Mahasiswa::create([
            'nama' => 'Riz',
            'nim' => '1010101',
            'id_dosen' => $dosen->id
        ]);

        $dadang = Mahasiswa::create([
            'nama' => 'Dadang Pelloy',
            'nim' => '1010102',
            'id_dosen' => $dosen->id
        ]);

        $feri = Mahasiswa::create([
            'nama' => 'Feri Ambyar Supriadi',
            'nim' => '1010103',
            'id_dosen' => $dosen->id
        ]);
        $this->command->info('Data Mahasiswa Berhasil dibuat');

        // Membuat Data Wali
        $ahmad = Wali::create([
            'nama' => 'Ahmad',
            'id_mahasiswa' => $riz->id
        ]);

        $dudung = Wali::create([
            'nama' => 'Dudung',
            'id_mahasiswa' => $dadang->id
        ]);

        $basit = Wali::create([
            'nama' => 'Basit',
            'id_mahasiswa' => $feri->id
        ]);
        $this->command->info('Data Wali Berhasil dibuat');

        // Membuat data Hobi
        $futsal = Hobi::create([
            'hobi' => 'Futsal',
        ]);

        $gaming = Hobi::create([
            'hobi' => 'Game Mobile',
        ]);

        $mengaji = Hobi::create([
            'hobi' => 'Mengaji Al Quran',
        ]);

        // Melampirkan Hobi ke Mahasiswa
        $riz->hobi()->attach($futsal->id);
        $riz->hobi()->attach($mengaji->id);
        $dadang->hobi()->attach($gaming->id);
        $feri->hobi()->attach($mengaji->id);
        $this->command->info('Data Hobi Mahasiswa Berhasil dibuat');
    }
}
