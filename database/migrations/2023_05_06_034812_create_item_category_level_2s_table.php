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
        Schema::create('item_category_level_2s', function (Blueprint $table) {
            $table->id('Item_category_level_2_id');
            $table->integer('Item_category_level_1_id');
            $table->string('category_level_2',100);
            $table->boolean('is_active')->default("1");
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
        Schema::dropIfExists('item_category_level_2s');
    }
};
