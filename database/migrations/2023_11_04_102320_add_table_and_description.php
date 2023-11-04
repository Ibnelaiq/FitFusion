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
        Schema::table('promotion_sliders', function (Blueprint $table) {
            $table->text('description')->nullable()->after("id");
            $table->string('title')->nullable()->after("id");

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promotion_sliders', function (Blueprint $table) {
            //
        });
    }
};
