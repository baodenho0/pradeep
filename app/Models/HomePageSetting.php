<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'hero_main_heading',
        'hero_sub_heading',
        'hero_cta_text',
        'financial_platform_heading',
        'financial_platform_description',
        'financial_platform_cta_text',
        'emi_calculator_heading',
        'emi_calculator_intro_text',
        'why_karjabank_heading',
        'marketplace_heading',
        'marketplace_description',
        'expert_section_heading',
        'expert_section_sub_heading',
        'testimonial_heading',
        'testimonial_sub_heading',
        'news_insights_heading',
        'news_insights_sub_heading',
        'partners_heading',
        'app_download_heading',
        'app_download_description',
        'app_download_android_cta',
        'app_download_ios_cta',
    ];
}
