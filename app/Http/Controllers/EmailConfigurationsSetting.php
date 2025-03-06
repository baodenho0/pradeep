<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class EmailConfigurationsSetting extends Controller
{
    public function index()
    {
        $settings = EmailConfigurationsSetting::first();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $settings
        ], Response::HTTP_OK);
    }

    public function update(Request $request)
    {
        try {
            $validated = $request->validate([
                'smtp_host' => 'nullable|string',
                'smtp_port' => 'nullable|string',
                'smtp_username' => 'nullable|string',
                'smtp_password' => 'nullable|string',
                'encryption_type' => 'nullable|string',
                'from_email' => 'nullable|email',
                'from_name' => 'nullable|string',
                'welcome_email' => 'nullable|integer|in:1,0',
                'welcome_subject' => 'nullable|string',
                'welcome_content' => 'nullable|string',
                'order_confirmation' => 'nullable|integer|in:1,0',
                'order_subject' => 'nullable|string',
                'order_content' => 'nullable|string',
                'password_reset' => 'nullable|integer|in:1,0',
                'password_reset_subject' => 'nullable|string',
                'password_reset_content' => 'nullable|string',
                'admin_notification_email' => 'nullable|email',
                'new_order_notifications' => 'nullable|integer|in:1,0',
                'new_user_notifications' => 'nullable|integer|in:1,0',
                'contact_form_notifications' => 'nullable|integer|in:1,0',
                'daily_digest_email' => 'nullable|integer|in:1,0',
            ]);

            $settings = EmailConfigurationsSetting::first();
            if (!$settings) {
                $settings = EmailConfigurationsSetting::create($validated);
            } else {
                $settings->update($validated);
            }

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Email configurations settings updated successfully',
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
