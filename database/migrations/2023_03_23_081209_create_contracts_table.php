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
            $table->string('is_booking')->default(0);
            $table->string('booking_code')->nullable();
            $table->integer('room_wide');
            $table->string('time_period');
            $table->string('total_period');
            $table->integer('term');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('term_payment');
            $table->integer('contract_payment');
            $table->integer('service_charge');
            $table->string('ppn_type');
            $table->integer('ppn_option')->default(10);
            $table->integer('ppn');
            $table->integer('contract_deposit');
            $table->integer('line_deposit')->nullable();
            $table->integer('stamp')->nullable();
            $table->string('description');
            $table->integer('additional_service')->nullable();
            $table->integer('total_payment');
            $table->foreignId('room_id')->constrained();
            $table->foreignId('room_position_id')->nullable()->constrained();
            $table->foreignId('tenant_id')->constrained();
            $table->foreignId('service_id')->nullable()->constrained();
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
