<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSetCalendarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('set_calendars', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('apartment_id')->unsigned();
            $table->integer('customer_id')->unsigned();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('time');
            $table->text('note');
            $table->tinyInteger('status')->default(1);
            $table->foreign('apartment_id')
                ->references('id')->on('apartments')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('customer_id')
                ->references('id')->on('customers')
                ->onUpdate('cascade')
                ->onDelete('cascade');


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
        Schema::dropIfExists('set_calendars');
    }
}
