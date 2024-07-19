<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCctvTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cctv', function (Blueprint $table) {
            $table->id(); // Menggunakan id sebagai primary key
            $table->string('cctv_ruas');
            $table->foreignId('roles_id');
            $table->string('cctv_lokasi');
            // $table->timestamp('cctv_waktu')->useCurrent();
            $table->string('cctv_video');
            $table->string('cctv_status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cctv');
    }
}
