<?php

namespace Database\Seeders;

use App\Models\Kelas as ModelsKelas;
use Illuminate\Database\Seeder;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelsKelas::create([
            'nama' => '10 RPL 1'
        ]);
        ModelsKelas::create([
            'nama' => '11 RPL 1'
        ]);
        ModelsKelas::create([
            'nama' => '12 RPL 1'
        ]);
        ModelsKelas::create([
            'nama' => '10 RPL 2'
        ]);
        ModelsKelas::create([
            'nama' => '11 RPL 2'
        ]);
        ModelsKelas::create([
            'nama' => '12 RPL 2'
        ]);
    }
}
