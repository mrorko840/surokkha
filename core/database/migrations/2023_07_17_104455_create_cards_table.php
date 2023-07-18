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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('certificate_no')->nullable();
            $table->string('type')->nullable();
            $table->string('nid_no')->nullable();
            $table->string('birth_no')->nullable();
            $table->string('passport_no')->nullable();
            $table->string('nationality')->nullable();
            $table->string('name')->nullable();
            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->date('dose1date')->nullable();
            $table->string('dose1name')->nullable();
            $table->date('dose2date')->nullable();
            $table->string('dose2name')->nullable();
            $table->date('dose3date')->nullable();
            $table->string('dose3name')->nullable();
            $table->text('vaccin_center')->nullable();
            $table->text('vaccin_by')->nullable();
            $table->string('total_dose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
