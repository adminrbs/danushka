<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id('employee_id');
            $table->string('employee_name',200)->uniqid();
            $table->string('office_mobile',15);
            $table->string('Office_email',250);
            $table->string('persional_mobile',15);
            $table->string('persional_fixed',15);
            $table->string('persional_email',250);
            $table->tinyText('address');
            $table->integer('desgination_id')->uniqid();
            $table->integer('report_to');
            $table->date('date_of_joined');
            $table->date('date_of_resign');
            $table->integer('status_id');
            $table->tinyText('note');
            $table->timestamps();



        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
