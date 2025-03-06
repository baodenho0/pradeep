<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class TestimonialController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => Testimonial::all()
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string',
                'message' => 'nullable|string',
                'image' => 'nullable|string',
            ]);

            $testimonial = Testimonial::create($data);
            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Testimonial created successfully',
                'data' => $testimonial
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show(Testimonial $testimonial)
    {
        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $testimonial
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'position' => 'nullable|string',
                'message' => 'nullable|string',
                'image' => 'nullable|string',
            ]);
            $testimonial = $testimonial->update($data);
            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Testimonial updated successfully',
                'data' => $testimonial
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Testimonial deleted successfully'
        ], Response::HTTP_OK);
    }
}
