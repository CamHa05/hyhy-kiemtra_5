<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->tinyInteger('status')->default(1)->after('id'); 
            // 'after' đặt cột status ngay sau cột id, không bắt buộc
        });
    }

    public function down(): void
    {
        Schema::table('movie', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
