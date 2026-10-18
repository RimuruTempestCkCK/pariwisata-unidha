<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('profile_items', function (Blueprint $table) {
            $table->id();
            $table->string('kategori');
            $table->string('label');
            $table->text('isi');
            $table->string('keterangan')->nullable();
            $table->integer('order')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('profile_items');
    }
};
