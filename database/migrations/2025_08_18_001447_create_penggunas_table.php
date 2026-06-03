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
        Schema::create('penggunas', function (Blueprint $table) {
             $table->id();
            $table->text('foto_profil')->nullable();
            $table->string('nama');
            $table->string('angkatan');
            $table->string('prodi');
            $table->string('asrama');
            $table->string('status');
            $table->string('nim');
            $table->string('password');
            $table->string('kamar');
            $table->string('remember_token', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penggunas');
        $table->dropColumn('remember_token');
    }
};
