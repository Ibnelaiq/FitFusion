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
        Schema::table('customer_memberships', function (Blueprint $table) {
            $table->date("paused_at")->nullable();
            $table->int("balance_days")->nullable();
            $table->text("pausing_reason")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('customer_memberships', function (Blueprint $table) {
            //
        });
    }
};
