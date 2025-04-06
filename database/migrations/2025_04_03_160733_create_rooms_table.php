<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('rooms', function (Blueprint $table) {
        $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
        $table->string('type');
        $table->decimal('price', 10, 2);
        $table->text('description')->nullable();
        $table->string('status')->default('available');
        $table->string('image_url')->nullable();
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
}
