<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('houses', function (Blueprint $table) {
            $table->float('price')->default(0)->change();
            $table->integer('surface')->default(0)->change();
            $table->integer('bedrooms')->default(0)->change();
            $table->integer('bathrooms')->default(0)->change();
            $table->boolean('sold')->default(false)->change();
            $table->boolean('is_published')->default(false)->change();
            $table->text('images')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('houses', function (Blueprint $table) {
            //
        });
    }
};
