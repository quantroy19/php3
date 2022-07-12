<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // Tạo dữ liệu test
        $dataStudentSeed=[
            ['name'=>'Do Minh Quan',
           'created_at'=>date('Y-m-dH:i:s'),
           'updated_at'=>date('Y-m-dH:i:s'),
           ],
        ];
        for($i=0; $i<100; $i++){
            array_push($dataStudentSeed,
                ['name'=>'Do Minh Quan ' . $i,
               // có thể bỏ trống vì đã dùng nullable
                'created_at'=>date('Y-m-dH:i:s'),
                'updated_at'=>date('Y-m-dH:i:s'),
            ],);
        }
        DB::table('users')->insert($dataStudentSeed);
    }
}
