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
        Schema::create('room_positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('front')->constrained('rooms');
            $table->foreignId('back')->constrained('rooms');
            $table->foreignId('left')->constrained('rooms');
            $table->foreignId('right')->constrained('rooms');
            $table->foreignId('building_id')->constrained();
            $table->foreignId('floor_id')->constrained();
            $table->foreignId('room_id')->constrained();
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
        Schema::dropIfExists('room_positions');
    }
};
