<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('landing_elements', function (Blueprint $table) {
            $table->id();
            $table->string('seksi');
            $table->string('parameter');
            $table->text('konten');
            $table->string('cta_text')->nullable();
            $table->string('cta_link')->nullable();
            $table->string('status')->default('Aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('landing_elements');
    }
};
