<?php

namespace Database\Seeders;

use App\Models\Student\Major;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   $major = ['Computer Science','Economics',' Business',' English Language and Literature'];
        foreach($major as $item){
            DB::table('majors')->insert([
                'name' => $item,
                'created_at' => date('Y-m-d H:m:s'),
            ]);
        }
    }
}
