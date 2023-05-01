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
        Schema::create('customer_contacts', function (Blueprint $table) {
            $table->id('customer_contacts_id');
            $table->integer('customer_id');
            $table->string('contact_persion',200);
            $table->string('degination');
            $table->string('mobile',20);
            $table->string('fixed',20);
            $table->string('email',250);
            $table->string('remarks',250);
            $table->boolean('primary_contact');
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
        Schema::dropIfExists('customer_contacts');
    }
};
