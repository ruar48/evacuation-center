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
        Schema::create('evacuation_infos', function (Blueprint $table) {
            $table->id();
            $table->string('Last_name');
            $table->string('First_name');
            $table->string('Middle_name');
            $table->string('contact');
            $table->string('age');
            $table->string('gender');
            $table->string('brgy');
            $table->string('address');
            $table->string('head_fam');
            $table->string('evac_center');
            $table->string('calamity');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('evacuation_infos');
    }
};
