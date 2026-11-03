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
        Schema::create('styles', function (Blueprint $table) {

            $table->id();

            $table->string('style_name');

            $table->string('style_no')->unique();

            $table->foreignId('buyer_id')
                ->nullable()
                ->constrained('buyers')
                ->nullOnDelete();

            $table->string('season')->nullable();

            $table->enum('status', ['active', 'inactive'])
                ->default('active');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('styles');
    }
};
