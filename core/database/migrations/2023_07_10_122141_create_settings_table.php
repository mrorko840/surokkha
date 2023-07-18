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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->decimal('recharge_limit', 8, 2)->nullable();
            $table->decimal('charge_normal', 8, 2)->nullable();
            $table->decimal('charge_special', 8, 2)->nullable();
            $table->text('support_link')->nullable();
            $table->text('recharge_notice')->nullable();
            $table->text('site_notice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
