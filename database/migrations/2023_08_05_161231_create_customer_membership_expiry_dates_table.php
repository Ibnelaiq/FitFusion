<?php

use App\Models\V1\CustomerMemberships;
use App\Models\V1\User;
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
        Schema::create('customer_membership_expiry_dates', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(CustomerMemberships::class);
            $table->foreignIdFor(User::class,"created_by")->nullable();
            $table->integer("days");
            $table->integer("status");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_membership_expiry_dates');
    }
};
