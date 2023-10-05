<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('master_categories')->insert([
            'id'=>'001',
            'name'=>'Andika',
            'description'=>'Siswa PKL',
            'seq'=>'1',
            'is_deleted'=>'1',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('master_categories')->insert([
            'id'=>'002',
            'name'=>'Zaenal',
            'description'=>'Siswa PKL',
            'seq'=>'2',
            'is_deleted'=>'2',
            'created_at' => date('Y-m-d H:i:s')
        ]);
        DB::table('master_categories')->insert([
            'id'=>'003',
            'name'=>'Kisama',
            'description'=>'Siswa PKL',
            'seq'=>'3',
            'is_deleted'=>'3',
            'created_at' => date('Y-m-d H:i:s')
        ]);
    }
}
