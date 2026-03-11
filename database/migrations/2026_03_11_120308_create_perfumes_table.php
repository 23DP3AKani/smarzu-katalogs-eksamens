<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('perfumes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('brand');
            $table->string('image_url')->nullable();
            $table->text('short_description');
            $table->enum('gender', ['vīriešiem', 'sievietēm', 'unisex']);
            $table->enum('season', ['vasarai', 'ziemai', 'pavasarim', 'rudenim', 'vissezonas']); // Сезон
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perfumes');
    }
};