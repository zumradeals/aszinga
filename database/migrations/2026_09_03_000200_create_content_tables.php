<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
return new class extends Migration {
 public function up(): void {
  Schema::create('staff_members',function(Blueprint $t){$t->id();$t->string('name');$t->string('role');$t->string('photo_path')->nullable();$t->text('bio')->nullable();$t->string('phone')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
  Schema::create('gallery_items',function(Blueprint $t){$t->id();$t->string('image_path');$t->string('caption')->nullable();$t->string('album')->nullable();$t->date('taken_at')->nullable();$t->unsignedInteger('sort_order')->default(0);$t->boolean('is_published')->default(true);$t->timestamps();});
  Schema::create('partners',function(Blueprint $t){$t->id();$t->string('name');$t->string('logo_path')->nullable();$t->string('website_url')->nullable();$t->text('description')->nullable();$t->boolean('is_active')->default(true);$t->unsignedInteger('sort_order')->default(0);$t->timestamps();});
 }
 public function down(): void {Schema::dropIfExists('partners');Schema::dropIfExists('gallery_items');Schema::dropIfExists('staff_members');}
};
