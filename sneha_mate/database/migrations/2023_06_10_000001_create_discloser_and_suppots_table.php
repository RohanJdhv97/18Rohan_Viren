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
        Schema::create('discloser_and_suppots', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('share_about_yourself');
            $table->string('kind_of_support');
            $table->string('disclosing_sharing_status');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discloser_and_suppots');
    }
};
