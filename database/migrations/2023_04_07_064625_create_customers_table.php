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
        Schema::create('customers', function (Blueprint $table) {
            
            $table->id('customer_id');
            $table->string('customer_name', 200);
            $table->tinyText('primary_address');
            $table->string('primary_mobile_number',15);
            $table->string('primary_fixed_number',15);
            $table->string('primary_email',250);
            $table->integer('disctrict_id');
            $table->integer('town_id');
            $table->tinyText('google_map_link');
            $table->string('gps_latitude',45);
            $table->string('gps_longitude',45);
            $table->integer('customer_group_id');
            $table->integer('customer_grade_id');
            $table->boolean('deliver_primary_address');
            $table->decimal('credit_amount_alert_limit',10,2);
            $table->decimal('credit_amount_hold_limit',10,2);
            $table->decimal('credit_period_alert_limit',10,2);
            $table->decimal('credit_period_hold_limit',10,2);
            $table->decimal('pd_cheque_limit',10,2);
            $table->decimal('pd_cheque_max_period',10,2);
            $table->integer('credit_control_type');
            $table->boolean('sms_notification');
            $table->boolean('whatapp_notification');
            $table->boolean('email_notification');
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
        Schema::dropIfExists('customers');
    }
};
