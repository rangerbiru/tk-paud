<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBiayaSiswaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['nama' => 'TK', 'pendaftaran' => 100000, 'pangkal' => 2300000, 'seragam' => 750000, 'bulanan' => 350000, 'denda_permenit' => 0, 'keterangan' => ''],
            ['nama' => 'Taman Penitipan Anak (Seharian)', 'pendaftaran' => 100000, 'pangkal' => 1500000, 'seragam' => 0, 'bulanan' => 800000, 'denda_permenit' => 10000, 'keterangan' => '08.00 - 17.00'],
            ['nama' => 'Taman Penitipan Anak (Stengah hari)', 'pendaftaran' => 100000, 'pangkal' => 1500000, 'seragam' => 0, 'bulanan' => 650000, 'denda_permenit' => 10000, 'keterangan' => '11.30 - 17.00'],

        ];
        DB::table('jenis_biaya_siswa')->insert($data);
    }
}
