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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('number');
            $table->json('dimentions');
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('materials_id')->constrained('materials');
            $table->foreignId('subtype_id')->constrained('subtypes');
            $table->foreignId('colection_id')->constrained('colections');
            $table->foreignId('action_conserve_id')->constrained('actions_conserve');
            $table->integer('weight');
            $table->string('technic');
            $table->string('integrity');
            $table->string('conservation_state');
            $table->string('conservation_detail');
            $table->text('description');
            $table->string('reference');
            $table->date('date_cadastred');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
