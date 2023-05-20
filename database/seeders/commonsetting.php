<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
use Carbon\Carbon;

class commonsetting extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('districts')->insert([

            'district_name' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('towns')->insert([
            'district_id'=>'1',
            'town_name' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('customer_groups')->insert([

            'group' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('customer_grades')->insert([

            'grade' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_category_level_1s')->insert([

            'category_level_1' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_category_level_2s')->insert([
            'Item_category_level_1_id'   => 1,
            'category_level_2' => 'Not Applicable',
            'is_active' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_category_level_3s')->insert([
            'Item_category_level_2_id'   => 1,
            'category_level_3' => 'Not Applicable',
            'is_active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('employee_designations')->insert([
            'employee_designation' => 'Not Applicable',
            'is_active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        DB::table('employee__statuses')->insert([
            'employee_status' => 'Not Applicable',
            'is_active' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('supply_groups')->insert([
            'supply_group' => 'Not Applicable',
            'status_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('item_altenative_names')->insert([
            'item_altenative_name' => 'Not Applicable',
            'status_id' => '1',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
       DB::table('employees')->insert([
            'employee_name' => 'Not Applicable',
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
        ]);
    }
}
