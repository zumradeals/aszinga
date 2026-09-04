<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('competitions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('season')->nullable();
            $table->text('description')->nullable();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('standings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('competition_id')->constrained()->cascadeOnDelete();
            $table->string('team_name');
            $table->unsignedInteger('position');
            $table->unsignedInteger('played')->default(0);
            $table->unsignedInteger('won')->default(0);
            $table->unsignedInteger('drawn')->default(0);
            $table->unsignedInteger('lost')->default(0);
            $table->integer('goals_for')->default(0);
            $table->integer('goals_against')->default(0);
            $table->integer('points')->default(0);
            $table->timestamps();
            $table->unique(['competition_id', 'team_name']);
            $table->unique(['competition_id', 'position']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('standings');
        Schema::dropIfExists('competitions');
    }
};
