<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GeneralContentSetting;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;


class GeneralContentSettingController extends Controller
{
    public function index()
    {
        $settings = GeneralContentSetting::first();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $settings
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'description' => 'nullable|string',
                'disclaimer' => 'nullable|string',
                'copyright_text' => 'nullable|string',
                'address' => 'nullable|string|max:255',
                'meta_description' => 'nullable|string',
                'google_map_embed' => 'nullable|string',
                'meta_keyword' => 'nullable|string',
                'opening_hours' => 'nullable|string|max:255',
                'google_analytics_id' => 'nullable|string|max:50',
                'alternative_phone' => 'nullable|string|max:20',
                'tagline' => 'nullable|string|max:255',
                'support_email' => 'nullable|email',
            ]);

            $settings = GeneralContentSetting::first();
            if (!$settings) {
                $settings = GeneralContentSetting::create($validated);
            } else {
                $settings->update($validated);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'General content settings updated successfully',
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
