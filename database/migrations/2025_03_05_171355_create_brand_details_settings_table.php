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
        Schema::create('brand_details_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->text('brand_description')->nullable();
            $table->string('contact_email')->nullable();
            $table->string('contact_phone')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->timestamps();
        });

        DB::table('brand_details_settings')->insert([
            'site_name' => null,
            'logo' => null,
            'favicon' => null,
            'brand_description' => null,
            'contact_email' => null,
            'contact_phone' => null,
            'facebook' => null,
            'twitter' => null,
            'instagram' => null,
            'linkedin' => null,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('brand_details_settings');
    }
};
