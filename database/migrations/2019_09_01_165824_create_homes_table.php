<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHomesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->string('sub_caption1')->nullable();
            $table->string('sub_caption2')->nullable();
            $table->string('sub_caption3')->nullable();
            $table->string('title')->nullable();
            $table->string('sub_title1')->nullable();
            $table->string('sub_title2')->nullable();
            $table->string('sub_title3')->nullable();
            $table->text('body')->nullable();
            $table->string('btn')->nullable();
            $table->enum('status', ['0', '1'])->default('0');
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
        Schema::dropIfExists('homes');
    }
}
