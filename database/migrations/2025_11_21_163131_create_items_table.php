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
            $table->text('description');
            $table->string('number');

            $table->integer('length')->nullable();
            $table->integer('height')->nullable();
            $table->integer('width')->nullable();
            $table->integer('weight');

            $table->string('archeological_site');
            $table->string('technic');
            $table->string('reference');

            $table->string('integrity');
            $table->string('conservation_state');
            $table->string('conservation_detail');

            $table->foreignId('location_id')->constrained('locations')->unique()->restrictOnDelete();
            $table->foreignId('subtype_id')->constrained('subtypes')->restrictOnDelete();
            $table->foreignId('collection_id')->constrained('collections')->restrictOnDelete();
            $table->foreignId('ethnic_group_id')->constrained('ethnic_groups')->restrictOnDelete();

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
