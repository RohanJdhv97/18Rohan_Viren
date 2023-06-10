<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('health', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('enough_medicines');
            $table->integer('days_meds_missed');
            $table->string('cd4_count');
            $table->string('cd4_count_num');
            $table->string('viral_load_count');
            $table->string('viral_count_num');
            $table->string('fallen_sick');
            $table->string('share_health');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health');
    }
};
