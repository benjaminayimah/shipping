<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('email');
            $table->string('order_status');
            $table->string('pick_up');
            $table->string('price');
            $table->string('tracking_id');
            $table->string('shipment_type');
            $table->string('cargo_name');
            $table->string('est_weight');
            $table->string('weight_unit');
            $table->string('packaging');
            $table->string('quantity');
            $table->string('cargo_type');
            $table->string('insurance');
            $table->string('sender_country');
            $table->string('sender_state');
            $table->string('sender_city');
            $table->string('sender_zipcode');
            $table->string('sender_streetadd');
            $table->string('sender_apartment');
            $table->string('sender_name');
            $table->string('sender_number');
            $table->string('receiver_country');
            $table->string('receiver_state');
            $table->string('receiver_city');
            $table->string('receiver_zipcode');
            $table->string('receiver_streetadd');
            $table->string('receiver_apartment');
            $table->string('receiver_name');
            $table->string('receiver_number');
            $table->string('pickup_name');
            $table->string('pickup_number');
            $table->string('pickup_date');
            $table->text('additional_details');
            $table->string('author');
            $table->enum('publish_status',['0','1'])->default('0');
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
        Schema::dropIfExists('shipments');
    }
}
