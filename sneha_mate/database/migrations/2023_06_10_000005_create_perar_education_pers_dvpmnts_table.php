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
        Schema::create('perar_education_pers_dvpmnts', function (
            Blueprint $table
        ) {
            $table->bigIncrements('id');
            $table->string('understanding_life_choices');
            $table->string('qualities_for_pe');
            $table->string('focus_for_independent_And_sustainable_life');
            $table->string('pe_help_future');
            $table->unsignedBigInteger('user_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perar_education_pers_dvpmnts');
    }
};
