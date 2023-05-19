<?php

namespace Database\Seeders;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomSetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('districts')->insert([

            'district_name' => 'Not Aplicabale',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);


        DB::table('item_category_level_1s')->insert([

            'category_level_1' => 'Not Aplicabale',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_category_level_2s')->insert([
            'Item_category_level_1_id'   => 1,
            'category_level_2' => 'Not Aplicabale',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_category_level_3s')->insert([
            'Item_category_level_2_id'   => 1,
            'category_level_3' => 'Not Aplicabale',
            'is_active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('employee_designations')->insert([
            'employee_designation' => 'Not Aplicabale',
            'is_active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
      /*  DB::table('employees')->insert([
            'employee_name' => 'Not Aplicabale',
            'office_mobile' => '1',
            'Office_email' => '1',
            'persional_mobile' => '1',
            'persional_fixed' => '1',
            'persional_email' => '1',
            'address' => '1',
            'desgination_id' => '1',
            'report_to' => '1',
            'date_of_joined' => '2023-05-19 09',
            'date_of_resign' => '2023-05-19 09',
            'note' => '1',
            'status_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);*/
    }
}
