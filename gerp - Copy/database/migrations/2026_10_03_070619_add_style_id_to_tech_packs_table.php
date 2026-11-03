<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('tech_packs', function (Blueprint $table) {
            $table->foreignId('style_id')
                ->nullable()
                ->after('id')
                ->constrained('styles')
                ->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('tech_packs', function (Blueprint $table) {
            $table->dropForeign(['style_id']);
            $table->dropColumn('style_id');
        });
    }
};