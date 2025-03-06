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
        Schema::create('home_page_settings', function (Blueprint $table) {
            $table->id();
            $table->string('hero_main_heading')->nullable();
            $table->string('hero_sub_heading')->nullable();
            $table->string('hero_cta_text')->nullable();

            $table->string('financial_platform_heading')->nullable();
            $table->text('financial_platform_description')->nullable();
            $table->string('financial_platform_cta_text')->nullable();

            $table->string('emi_calculator_heading')->nullable();
            $table->text('emi_calculator_intro_text')->nullable();

            $table->string('why_karjabank_heading')->nullable();

            $table->string('marketplace_heading')->nullable();
            $table->text('marketplace_description')->nullable();

            $table->string('expert_section_heading')->nullable();
            $table->string('expert_section_sub_heading')->nullable();

            $table->string('testimonial_heading')->nullable();
            $table->string('testimonial_sub_heading')->nullable();

            $table->string('news_insights_heading')->nullable();
            $table->string('news_insights_sub_heading')->nullable();

            $table->string('partners_heading')->nullable();

            $table->string('app_download_heading')->nullable();
            $table->text('app_download_description')->nullable();
            $table->string('app_download_android_cta')->nullable();
            $table->string('app_download_ios_cta')->nullable();


            $table->timestamps();
        });

        DB::table('home_page_settings')->insert([
            'hero_main_heading' => 'What are you looking for today?',
            'hero_sub_heading' => '',
            'hero_cta_text' => 'Apply Online',
            'financial_platform_heading' => 'We are more than just a financial platform.',
            'financial_platform_description' => 'At KarjaBank, we are more than just a financial platform - we are your trusted partner in achieving financial freedom and success. We go beyond just providing loans and services to help you with personalized financial advice that fits your specific needs and your ambitions in todays market. Through tailored and customized.',
            'financial_platform_cta_text' => 'Know More',
            'emi_calculator_heading' => 'Online EMI Calculator',
            'emi_calculator_intro_text' => 'Calculate your monthly EMI payments with our easy-to-use tool',
            'why_karjabank_heading' => 'Why Choose KarjaBank?',
            'marketplace_heading' => 'Marketplace',
            'marketplace_description' => 'Our integrated Marketplace is designed for all your financial needs under one roof. Compare and apply for various financial products from trusted providers with ease.',
            'expert_section_heading' => 'Meet our experts',
            'expert_section_sub_heading' => '',
            'testimonial_heading' => 'What our customer says?',
            'testimonial_sub_heading' => 'Don\'t just take our word for it - hear from some of our satisfied customers!',
            'news_insights_heading' => 'Our News & Insights',
            'news_insights_sub_heading' => 'Stay up to date with the latest financial news and market trends',
            'partners_heading' => 'Our Partners',
            'app_download_heading' => 'Download Mobile App',
            'app_download_description' => 'Get our app for the best experience, real-time updates, and exclusive offers',
            'app_download_android_cta' => 'Get it on Google Play',
            'app_download_ios_cta' => 'Download on App Store',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('home_page_settings');
    }
};
