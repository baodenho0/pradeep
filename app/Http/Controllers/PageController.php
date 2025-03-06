<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $pages = Page::query();

        if ($request->has('status')) {
            $pages->where('status', $request->status);
        }

        $pages = $pages->orderBy('created_at', 'desc')->get();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $pages
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'short_description' => 'nullable',
                'featured_image' => 'nullable',
                'content' => 'nullable',
                'visits' => 'nullable',
                'status' => 'nullable',
            ]);

            $page = Page::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'short_description' => $validated['short_description'],
                'featured_image' => $validated['featured_image'],
                'content' => $validated['content'],
                'status' => $validated['status'],
                'user_id' => auth()?->user()?->id ?? 0,
            ]);

            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Page created successfully',
                'data' => $page
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function show($slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();
        $page->increment('visits');

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $page
        ], Response::HTTP_OK);
    }

    public function update(Request $request, Page $page)
    {
        try {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'short_description' => 'nullable|string',
                'featured_image' => 'nullable|string',
                'content' => 'nullable|string',
                'status' => 'sometimes|boolean',
            ]);

            if ($request->has('title')) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            $page->update($validated);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Page updated successfully',
                'data' => $page
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy(Page $page)
    {
        $page->delete();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Page deleted successfully'
        ], Response::HTTP_OK);
    }

}
