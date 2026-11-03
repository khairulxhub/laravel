<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tech_packs', function (Blueprint $table) {
            $table->id();

            // Style relation
            $table->foreignId('style_id')
                ->constrained('styles')
                ->cascadeOnDelete();

            // Basic Tech Pack Information
            $table->string('tech_pack_no')->unique();
            $table->string('version')->default('V1.0');
            $table->string('product_type')->nullable();

            // Fabric Information
            $table->string('fabric')->nullable();
            $table->string('gsm')->nullable();
            $table->string('color')->nullable();

            // Size & Construction
            $table->string('size_range')->nullable();
            $table->text('construction')->nullable();
            $table->text('washing')->nullable();

            // Status
            $table->enum('status', [
                'draft',
                'pending',
                'approved',
                'rejected'
            ])->default('draft');

            // File / Notes
            $table->string('file_path')->nullable();
            $table->text('notes')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tech_packs');
    }
};
