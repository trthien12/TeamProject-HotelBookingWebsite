<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_type');
            $table->string('room_category');
            $table->integer('area');
            $table->string('view');
            $table->decimal('original_price', 15, 2);
            $table->decimal('discounted_price', 15, 2);
            $table->integer('available_rooms');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}