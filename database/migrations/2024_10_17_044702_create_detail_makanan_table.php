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
        Schema::create('detail_makanan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('makanan_id');
            $table->foreign('makanan_id')->references('id')->on('makanan')->onDelete('cascade')->onUpdate('cascade');
            $table->text('detail');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_makanan');
    }
};
