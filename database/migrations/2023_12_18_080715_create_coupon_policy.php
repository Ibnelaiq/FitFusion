<?php

use App\Models\V1\Coupons;
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
        Schema::create('coupon_policy', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Coupons::class);
            $table->integer("use_type");  //1 for single use, 2 for unlimited use.
            $table->string("user_specific")->nullable(); // has email of user if specific otherwise null.
            $table->integer("max_uses")->nullable(); // limit uses, if null then unlimited
            $table->timestamp("last_used_at")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupon_policy');
    }
};
