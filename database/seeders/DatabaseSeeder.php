<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Kelas;
use App\Models\Spp;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        $users = [
            [
               'nama_petugas'=>'Admin',
               'username'=> 'Yoekinon',
               'email'=>'admin@spp.com',
               'password'=> bcrypt('123456'),
               'type'=>1,
            ],
            [
               'nama_petugas'=>'Manager',
               'username' => 'MeowMeow',
               'email'=>'manager@spp.com',
               'password'=> bcrypt('123456'),
               'type'=> 0,
            ],
        ];

        $spp = [
            [
                'bulan' => 1,
                'nominal' => 150000,
            ],
            [
                'bulan' => 1,
                'nominal' => 200000,
            ],
            [
                'bulan' => 1,
                'nominal' => 250000,
            ],
            [
                'bulan' => 1,
                'nominal' => 300000,
            ],
        ];

        $kelas = [
            [
                'nama_kelas' => '10',
                'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_kelas' => '10',
                'kompetensi_keahlian' => 'Design Komunikasi Visual'
            ],
            [
                'nama_kelas' => '10',
                'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
            ],
            [
                'nama_kelas' => '10',
                'kompetensi_keahlian' => 'Teknik Kendaraan Ringan'
            ],
            [
                'nama_kelas' => '11',
                'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_kelas' => '11',
                'kompetensi_keahlian' => 'Design Komunikasi Visual'
            ],
            [
                'nama_kelas' => '11',
                'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
            ],
            [
                'nama_kelas' => '11',
                'kompetensi_keahlian' => 'Teknik Kendaraan Ringan'
            ],
            [
                'nama_kelas' => '12',
                'kompetensi_keahlian' => 'Rekayasa Perangkat Lunak'
            ],
            [
                'nama_kelas' => '12',
                'kompetensi_keahlian' => 'Design Komunikasi Visual'
            ],
            [
                'nama_kelas' => '12',
                'kompetensi_keahlian' => 'Teknik Komputer dan Jaringan'
            ],
            [
                'nama_kelas' => '12',
                'kompetensi_keahlian' => 'Teknik Kendaraan Ringan'
            ],
        ];
        foreach($kelas as $kel){
            Kelas::create($kel);
        }

        foreach ($users as $key => $user) {
            User::create($user);
        }

        foreach($spp as $sp){
            Spp::create($sp);
        }
    }
}
