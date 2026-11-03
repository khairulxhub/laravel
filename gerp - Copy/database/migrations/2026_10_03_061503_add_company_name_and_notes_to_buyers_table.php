<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('buyers', function (Blueprint $table) {
            if (!Schema::hasColumn('buyers', 'company_name')) {
                $table->string('company_name')->nullable()->after('name');
            }

            if (!Schema::hasColumn('buyers', 'notes')) {
                $table->text('notes')->nullable()->after('status');
            }
        });
    }

    public function down(): void
    {
        Schema::table('buyers', function (Blueprint $table) {
            if (Schema::hasColumn('buyers', 'company_name')) {
                $table->dropColumn('company_name');
            }

            if (Schema::hasColumn('buyers', 'notes')) {
                $table->dropColumn('notes');
            }
        });
    }
};