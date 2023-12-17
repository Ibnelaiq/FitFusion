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
        Schema::table('track_workout_workouts', function (Blueprint $table) {
            $table->foreignIdFor(Workouts::class)->after("id")->constrained();
            $table->text("instructions")->after("track_workout_id");
            $table->text("rep_info")->after("instructions");
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('track_workout_workouts', function (Blueprint $table) {
            //
        });
    }
};
