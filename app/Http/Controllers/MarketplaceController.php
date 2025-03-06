<?php

namespace App\Http\Controllers;

use App\Models\Marketplace;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class MarketplaceController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Marketplace::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $marketplace = Marketplace::create($data);
        return response()->json([
            'status' => Response::HTTP_CREATED,
            'message' => 'Marketplace created successfully',
            'data' => $marketplace
        ], Response::HTTP_CREATED);
    }

    public function show(Marketplace $marketplace)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $marketplace
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Marketplace $marketplace)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'icon' => 'nullable|string',
            'color' => 'nullable|string',
        ]);

        $marketplace->update($data);
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Marketplace updated successfully',
            'data' => $marketplace
        ], Response::HTTP_OK);
    }

    public function destroy(Marketplace $marketplace)
    {
        $marketplace->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Marketplace deleted successfully'
        ], Response::HTTP_OK);
    }
}
