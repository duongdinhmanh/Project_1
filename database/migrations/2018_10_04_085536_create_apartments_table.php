<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('post_id');
            $table->string('name');
            $table->string('slug');
            $table->text('desc');
            $table->string('img_detail');
            $table->text('desc');
            $table->float('acreage'); //dien tich
            $table->double('price');
            $table->string('address');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('garage');
            $table->string('image');
            $table->string('video');
            $table->text('detail');
            $table->string('floor_plans');
            $table->string('map');
            $table->tinyInteger('status')->default(1);

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
        Schema::dropIfExists('apartments');
    }
}
