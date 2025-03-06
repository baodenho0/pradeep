<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BrandDetailsSetting;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class BrandDetailsSettingController extends Controller
{
    public function index()
    {
        $settings = BrandDetailsSetting::first();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $settings
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'site_name' => 'nullable|string|max:255',
                'logo' => 'nullable|string',
                'favicon' => 'nullable|string',
                'brand_description' => 'nullable|string',
                'contact_email' => 'nullable|email',
                'contact_phone' => 'nullable|string|max:20',
                'facebook' => 'nullable|url',
                'twitter' => 'nullable|url',
                'instagram' => 'nullable|url',
                'linkedin' => 'nullable|url',
            ]);

            $settings = BrandDetailsSetting::first();
            if (!$settings) {
                $settings = BrandDetailsSetting::create($validated);
            } else {
                $settings->update($validated);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Settings updated successfully',
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
