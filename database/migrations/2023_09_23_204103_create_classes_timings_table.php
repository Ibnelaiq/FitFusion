<?php

use App\Models\V1\Classes;
use App\Models\V1\ClassesSlots;
use App\Models\V1\ClassesTimings;
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
        Schema::create('classes_timings', function (Blueprint $table) {
            $table->id();

            $table->foreignIdFor(Classes::class)->constrained();
            $table->foreignIdFor(ClassesSlots::class)->constrained();
            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes_timings');
    }
};
