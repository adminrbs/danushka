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
            $table->string('employee_name',200);
            $table->string('office_mobile',15)->nulabal();
            $table->string('Office_email',250)->nullable();
            $table->string('persional_mobile',15)->nullable();
            $table->string('persional_fixed',15)->nullable();
            $table->string('persional_email',250)->nullable();
            $table->tinyText('address')->nullable();
            $table->integer('desgination_id');
            $table->integer('report_to');
            $table->date('date_of_joined')->nullable();
            $table->date('date_of_resign')->nullable();
            $table->integer('status_id');
            $table->tinyText('note')->nullable();
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
