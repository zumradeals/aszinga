<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
 public function up(): void {
  Schema::create('players', function(Blueprint $t){$t->id();$t->string('first_name');$t->string('last_name');$t->string('display_name')->nullable();$t->unsignedTinyInteger('shirt_number')->nullable();$t->string('position');$t->string('photo_path')->nullable();$t->date('birth_date')->nullable();$t->unsignedSmallInteger('height_cm')->nullable();$t->string('preferred_foot',20)->nullable();$t->text('bio')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('matches', function(Blueprint $t){$t->id();$t->string('opponent_name');$t->string('competition')->nullable();$t->string('venue_type',20)->default('home');$t->dateTime('kickoff_at');$t->string('venue')->nullable();$t->string('status',20)->default('programme');$t->unsignedTinyInteger('as_zinga_score')->nullable();$t->unsignedTinyInteger('opponent_score')->nullable();$t->text('summary')->nullable();$t->timestamps();$t->index(['status','kickoff_at']);});
  Schema::create('news_posts', function(Blueprint $t){$t->id();$t->string('title');$t->string('slug')->unique();$t->text('excerpt')->nullable();$t->longText('body');$t->string('cover_image_path')->nullable();$t->string('status',20)->default('draft');$t->timestamp('published_at')->nullable();$t->foreignId('author_id')->nullable()->constrained('users')->nullOnDelete();$t->timestamps();});
  Schema::create('recruitment_applications', function(Blueprint $t){$t->id();$t->string('first_name');$t->string('last_name');$t->date('birth_date')->nullable();$t->string('position')->nullable();$t->string('phone');$t->string('email')->nullable();$t->string('location')->nullable();$t->text('experience')->nullable();$t->text('message')->nullable();$t->string('status',20)->default('nouvelle');$t->timestamps();});
 }
 public function down(): void { Schema::dropIfExists('recruitment_applications');Schema::dropIfExists('news_posts');Schema::dropIfExists('matches');Schema::dropIfExists('players'); }
};
