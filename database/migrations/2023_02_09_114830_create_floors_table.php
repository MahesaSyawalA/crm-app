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
        Schema::create('floors', function (Blueprint $table) {
            $table->id('id_floor');
            $table->string('code_floor');
            $table->string('name_floor');
            $table->integer('monthly_price');
            $table->integer('daily_price');
            $table->integer('service_charge_floor');
            $table->integer('service_charge_own_electricity');
            $table->integer('overtime_up_4');
            $table->integer('overtime_down_4');
            $table->timestamps();
            $table->foreignId('id_building')->constrained('buildings', 'id_building');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('floors');
    }
};
