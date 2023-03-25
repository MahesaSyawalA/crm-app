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
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('time_period');
            $table->integer('term_amount');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('service_charge');
            $table->string('information');
            $table->integer('total_payment');
            $table->foreignId('room_id')->constrained();
            $table->foreignId('tenant_id')->constrained();
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
        Schema::dropIfExists('contracts');
    }
};
