<?php

namespace App\Http\Controllers;

use App\Models\TrustSme;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class TrustSmeController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => TrustSme::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'icon' => 'nullable|string',
                'color' => 'nullable|string',
            ]);

            $trustSme = TrustSme::create($data);
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'TrustSme created successfully',
                'data' => $trustSme
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show(TrustSme $trustSme)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $trustSme
        ], Response::HTTP_OK);
    }

    public function update(Request $request, TrustSme $trustSme)
    {
        try {
            $data = $request->validate([
                'title' => 'required|string|max:255',
                'description' => 'nullable|string',
                'icon' => 'nullable|string',
                'color' => 'nullable|string',
            ]);

            $trustSme->update($data);
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'TrustSme updated successfully',
                'data' => $trustSme
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy(TrustSme $trustSme)
    {
        $trustSme->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'TrustSme deleted successfully'
        ], Response::HTTP_OK);
    }
}
