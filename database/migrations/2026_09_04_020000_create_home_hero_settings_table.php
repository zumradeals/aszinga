<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('home_hero_settings', function (Blueprint $table) {
            $table->id();
            $table->string('eyebrow')->default('Abobo • Abidjan • Côte d’Ivoire');
            $table->string('title')->default('ENSEMBLE');
            $table->string('highlight')->default('PLUS FORTS');
            $table->string('subtitle')->default('Formation, Discipline, Ambition');
            $table->text('description')->nullable();
            $table->foreignId('player_one_id')->nullable()->constrained('players')->nullOnDelete();
            $table->foreignId('player_two_id')->nullable()->constrained('players')->nullOnDelete();
            $table->foreignId('player_three_id')->nullable()->constrained('players')->nullOnDelete();
            $table->boolean('show_tiger')->default(true);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_hero_settings');
    }
};
