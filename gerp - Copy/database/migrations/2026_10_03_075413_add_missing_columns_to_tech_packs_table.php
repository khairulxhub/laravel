<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tech_packs', function (Blueprint $table) {

            if (!Schema::hasColumn('tech_packs', 'style_id')) {
                $table->foreignId('style_id')
                    ->nullable()
                    ->after('id')
                    ->constrained('styles')
                    ->cascadeOnDelete();
            }

            if (!Schema::hasColumn('tech_packs', 'tech_pack_no')) {
                $table->string('tech_pack_no')->nullable()->after('style_id');
            }

            if (!Schema::hasColumn('tech_packs', 'version')) {
                $table->string('version', 50)->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'product_type')) {
                $table->string('product_type')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'fabric')) {
                $table->string('fabric')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'gsm')) {
                $table->string('gsm', 100)->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'color')) {
                $table->string('color')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'size_range')) {
                $table->string('size_range')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'construction')) {
                $table->text('construction')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'washing')) {
                $table->text('washing')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'status')) {
                $table->string('status')->default('draft');
            }

            if (!Schema::hasColumn('tech_packs', 'notes')) {
                $table->text('notes')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'file_path')) {
                $table->string('file_path')->nullable();
            }

            if (!Schema::hasColumn('tech_packs', 'image_path')) {
                $table->string('image_path')->nullable();
            }
        });
    }

    public function down(): void
    {
        //
    }
};