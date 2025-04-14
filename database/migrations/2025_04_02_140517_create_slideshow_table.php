<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlideshowTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    // Kiểm tra nếu bảng chưa tồn tại thì mới tạo bảng
    if (!Schema::hasTable('slideshow')) {
        Schema::create('slideshow', function (Blueprint $table) {
            $table->id('S_ID');
            $table->text('S_img');
            $table->text('caption1');
            $table->text('caption2');
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
    // Xóa bảng khi rollback migration
    Schema::dropIfExists('slideshow');
}
}
