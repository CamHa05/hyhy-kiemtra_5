<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('movie', function (Blueprint $table) {
            // Sửa cột id thành auto-increment
            $table->bigIncrements('id')->change();
        });
    }

    public function down()
    {
        Schema::table('movie', function (Blueprint $table) {
            // Nếu rollback, chuyển về kiểu cũ (ví dụ BIGINT)
            $table->bigInteger('id')->change();
        });
    }
};
