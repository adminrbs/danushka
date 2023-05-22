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
        Schema::create('customer_app_users', function (Blueprint $table) {
            $table->id('customer_app_user_id');
            $table->integer('customer_id');
            $table->Text('email',250);
            $table->Text('mobile',50);
            $table->Text('password',100);
            $table->integer('status_id')->default("1");
            $table->integer('session_key')->nullable();
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
        Schema::dropIfExists('customer_app_users');
    }
};
