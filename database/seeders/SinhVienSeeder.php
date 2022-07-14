<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class SinhVienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dataSeed = [];
        for ($i = 0; $i < 20; $i++) {
            array_push(
                $dataSeed,
                [
                    'tensv' => 'Quan' . $i,
                    'khoa' => 3,
                    'tuoi' => random_int(15, 30),
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString(),
                ],
            );
        }
        DB::table('sinh-viens')->insert($dataSeed);
    }
}
