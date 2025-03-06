<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;


class MenuController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::whereNull('parent_id')
            ->where('status', Menu::STATUS_ACTIVE);
        if ($request?->type) {
            $menus = $menus->where('type', $request->type);
        }

        $menus = $menus->orderBy('position')
            ->with('childrenRecursive')
            ->get();

        return response()->json([
            'status' => Response::HTTP_OK,
            'data' => $menus
        ], Response::HTTP_OK);
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title' => 'required|string|max:255',
                'parent_id' => 'nullable|exists:menus,id',
                'type' => 'integer',
                'position' => 'integer',
                'status' => 'boolean',
                'url' => 'nullable',
                'name_en' => 'nullable',
                'name_np' => 'nullable',
            ]);

            $menu = Menu::create([
                'title' => $validated['title'],
                'slug' => Str::slug($validated['title']),
                'parent_id' => $validated['parent_id'],
                'type' => $validated['type'],
                'position' => $validated['position'],
                'status' => $validated['status'],
                'url' => $validated['url'],
                'name_en' => $validated['name_en'],
                'name_np' => $validated['name_np'],
            ]);

            return response()->json([
                'status' => Response::HTTP_CREATED,
                'message' => 'Menu created successfully',
                'data' => $menu
            ], Response::HTTP_CREATED);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function update(Request $request, Menu $menu)
    {
        try {
            $validated = $request->validate([
                'title' => 'sometimes|string|max:255',
                'parent_id' => 'nullable|exists:menus,id',
                'type' => 'sometimes|integer',
                'position' => 'sometimes|integer',
                'status' => 'sometimes|boolean',
            ]);

            if ($request->has('title')) {
                $validated['slug'] = Str::slug($validated['title']);
            }

            $menu->update($validated);

            return response()->json([
                'status' => Response::HTTP_OK,
                'message' => 'Menu updated successfully',
                'data' => $menu
            ], Response::HTTP_OK);
        } catch (ValidationException $e) {
            return response()->json([
                'status' => Response::HTTP_UNPROCESSABLE_ENTITY,
                'errors' => $e->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY);
        }
    }

    public function destroy(Menu $menu)
    {
        $menu->delete();

        return response()->json([
            'status' => Response::HTTP_OK,
            'message' => 'Menu deleted successfully'
        ], Response::HTTP_OK);
    }

}
