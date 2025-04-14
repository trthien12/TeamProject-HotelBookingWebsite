<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Kiểm tra xem bảng đã tồn tại chưa
        if (!Schema::hasTable('room_detail')) {
            Schema::create('room_detail', function (Blueprint $table) {
                $table->id();
                $table->string('room_type', 50);
                $table->string('bed_type', 50);
                $table->string('area', 40);
                $table->string('view', 50);
                $table->decimal('price_per_night', 10, 0);
                $table->decimal('discount_percent', 10, 0);
                $table->integer('remaining_rooms');
                $table->text('image_url');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room_detail');
    }
}
