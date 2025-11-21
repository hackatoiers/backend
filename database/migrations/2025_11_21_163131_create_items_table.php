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
            $table->string('name');
            $table->string('number');
            $table->integer('length')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->foreignId('location_id')->constrained('locations');
            $table->foreignId('subtype_id')->constrained('subtypes');
            $table->foreignId('colection_id')->constrained('colections');
            $table->integer('weight');
            $table->string('technic');
            $table->string('integrity');
            $table->string('conservation_state');
            $table->string('conservation_detail');
            $table->text('description');
            $table->string('reference');
            
            $table->timestamps();
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
