<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kesehatan_data', function (Blueprint $table) {
            $table->id();
            $table->string("nama");
            $table->string("prodi");
            $table->string("rumah_sakit");
            $table->string("tb");
            $table->string("bb");
            $table->string("tensi");
            $table->string("kelurahan");
            $table->string("observasi_dokter");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kesehatan_data');
    }
};
