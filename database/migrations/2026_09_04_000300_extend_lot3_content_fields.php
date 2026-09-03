<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('gallery_items', function (Blueprint $table) {
            $table->string('title')->nullable()->after('image_path');
        });

        Schema::table('recruitment_applications', function (Blueprint $table) {
            $table->text('admin_notes')->nullable()->after('message');
        });
    }

    public function down(): void
    {
        Schema::table('recruitment_applications', fn (Blueprint $table) => $table->dropColumn('admin_notes'));
        Schema::table('gallery_items', fn (Blueprint $table) => $table->dropColumn('title'));
    }
};
