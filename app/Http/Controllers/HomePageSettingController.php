<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use App\Models\HomePageSetting;

class HomePageSettingController extends Controller
{
    public function index()
    {
        $settings = HomePageSetting::first();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $settings
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'hero_main_heading' => 'nullable|string',
                'hero_sub_heading' => 'nullable|string',
                'hero_cta_text' => 'nullable|string',
                'financial_platform_heading' => 'nullable|string',
                'financial_platform_description' => 'nullable|string',
                'financial_platform_cta_text' => 'nullable|string',
                'emi_calculator_heading' => 'nullable|string',
                'emi_calculator_intro_text' => 'nullable|string',
                'why_karjabank_heading' => 'nullable|string',
                'marketplace_heading' => 'nullable|string',
                'marketplace_description' => 'nullable|string',
                'expert_section_heading' => 'nullable|string',
                'expert_section_sub_heading' => 'nullable|string',
                'testimonial_heading' => 'nullable|string',
                'testimonial_sub_heading' => 'nullable|string',
                'news_insights_heading' => 'nullable|string',
                'news_insights_sub_heading' => 'nullable|string',
                'partners_heading' => 'nullable|string',
                'app_download_heading' => 'nullable|string',
                'app_download_description' => 'nullable|string',
                'app_download_android_cta' => 'nullable|string',
                'app_download_ios_cta' => 'nullable|string',
            ]);

            $settings = HomePageSetting::first();
            if (!$settings) {
                $settings = HomePageSetting::create($validated);
            } else {
                $settings->update($validated);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Home page settings updated successfully',
                'data' => $settings
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }
}
