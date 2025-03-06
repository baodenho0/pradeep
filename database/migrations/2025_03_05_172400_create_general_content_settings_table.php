<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('general_content_settings', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->text('disclaimer')->nullable();
            $table->text('copyright_text')->nullable();
            $table->string('address')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('google_map_embed')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->string('opening_hours')->nullable();
            $table->string('google_analytics_id')->nullable();
            $table->string('alternative_phone')->nullable();
            $table->string('tagline')->nullable();
            $table->string('support_email')->nullable();
            $table->timestamps();
        });

        DB::table('general_content_settings')->insert([
            'description' => null,
            'disclaimer' => null,
            'copyright_text' => null,
            'address' => null,
            'meta_description' => null,
            'google_map_embed' => null,
            'meta_keyword' => null,
            'opening_hours' => null,
            'google_analytics_id' => null,
            'alternative_phone' => null,
            'tagline' => null,
            'support_email' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('general_content_settings');
    }
};
