<?php

use App\Models\V1\Workouts;
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
        Schema::create('workout_activated_muscles', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Workouts::class)->constrained();
            $table->string("code");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workout_activated_muscles');
    }
};
