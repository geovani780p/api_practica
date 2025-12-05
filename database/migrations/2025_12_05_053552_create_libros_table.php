<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Duplicate migration skipped: table already managed by 2025_12_05_000000_create_libros_table
        if (!Schema::hasTable('libros')) {
            Schema::create('libros', function (Blueprint $table) {
                $table->id();
                $table->string('titulo');
                $table->string('autor');
                $table->string('genero')->nullable();
                $table->integer('anio_publicacion')->nullable();
                $table->timestamps();
            });
        }
    }

    public function down(): void
    {
        // Do not drop; handled by primary migration
    }
};
