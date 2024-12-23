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
        if (Schema::hasColumn('users', 'phone')) { // Check if the column exists
            Schema::table('users', function (Blueprint $table) {
                // Set 'phone' column to nullable
                $table->string('phone')->nullable()->change();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'phone')) { // Check if the column exists
            Schema::table('users', function (Blueprint $table) {
                // Set 'phone' column back to non-nullable
                $table->string('phone')->nullable(false)->change();
            });
        }
    }
};
