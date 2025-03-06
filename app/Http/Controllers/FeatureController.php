<?php

namespace App\Http\Controllers;

use App\Models\Feature;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class FeatureController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Feature::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'info' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $feature = Feature::create($data);
        return response()->json([
            'status' => Response::HTTP_CREATED,
            'message' => 'Feature created successfully',
            'data' => $feature
        ], Response::HTTP_CREATED);
    }

    public function show(Feature $feature)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $feature
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Feature $feature)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'info' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $feature->update($data);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Feature updated successfully',
            'data' => $feature
        ], Response::HTTP_OK);
    }

    public function destroy(Feature $feature)
    {
        $feature->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Feature deleted successfully'
        ], Response::HTTP_OK);
    }
}
