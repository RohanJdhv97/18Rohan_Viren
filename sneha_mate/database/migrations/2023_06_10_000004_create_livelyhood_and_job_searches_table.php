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
        Schema::create('livelyhood_and_job_searches', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->string('livelihood_training_program');
            $table->string('sibling_job');
            $table->string('travel_to_art_center_program');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('livelyhood_and_job_searches');
    }
};
