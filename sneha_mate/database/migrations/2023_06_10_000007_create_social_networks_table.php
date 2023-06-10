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
        Schema::create('social_networks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('tb_positive');
            $table->string('hiv_friends');
            $table->string('friends_same_art');
            $table->string('where_met_friends');
            $table->string('attended_camp');
            $table->string('friends_in_camp');
            $table->string('topics_of_discussion');
            $table->string('likes_in_camp');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('social_networks');
    }
};
