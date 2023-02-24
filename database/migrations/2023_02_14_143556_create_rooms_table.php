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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('status')->default('active');
            $table->integer('wide');
            $table->integer('overtime_up_4_total');
            $table->integer('overtime_down_4_total');
            $table->integer('service_charge_total');
            $table->integer('own_electricity_total');
            $table->string('image')->nullable();
            $table->string('desc');
            $table->foreignId('floor_id')->constrained();
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
        Schema::dropIfExists('rooms');
    }
};
