<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('houses', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle');
            $table->text('short_description');
            $table->text('description');
            $table->float('price');
            $table->integer('surface');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->boolean('sold');
            $table->string('surroundings');
            $table->boolean('is_published');
            $table->text('images');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('houses');
    }
};
