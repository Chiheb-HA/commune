<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Actualite;
use Illuminate\Http\Request;

class NewsApiController extends Controller
{
    /**
     * Display a listing of published news (public endpoint)
     */
    public function index(Request $request)
    {
        $language = $request->input('lang', 'fr');
        $search = $request->input('search');
        $page = $request->input('page', 1);
        $perPage = $request->input('per_page', 10);

        $query = Actualite::published();

        if ($search) {
            $query = $query->where('titre_' . $language, 'LIKE', "%{$search}%")
                           ->orWhere('description_' . $language, 'LIKE', "%{$search}%");
        }

        $news = $query->latest()
            ->paginate($perPage, ['*'], 'page', $page);

        return response()->json([
            'success' => true,
            'data' => $news->items(),
            'pagination' => [
                'current_page' => $news->currentPage(),
                'last_page' => $news->lastPage(),
                'per_page' => $news->perPage(),
                'total' => $news->total(),
            ]
        ]);
    }

    /**
     * Display the specified news
     */
    public function show($id)
    {
        $news = Actualite::published()->findOrFail($id);

        // Increment views
        $news->incrementViews();

        return response()->json([
            'success' => true,
            'data' => $news
        ]);
    }

    /**
     * Create a news item (protected endpoint)
     */
    public function store(Request $request)
    {
        $this->authorize('create', Actualite::class);

        $validated = $request->validate([
            'titre_fr' => 'required|string|max:255',
            'titre_ar' => 'required|string|max:255',
            'titre_en' => 'required|string|max:255',
            'description_fr' => 'required|string',
            'description_ar' => 'required|string',
            'description_en' => 'required|string',
            'slug' => 'required|string|unique:actualites',
            'status' => 'required|in:PUBLISHED,UNPUBLISHED,ARCHIVE,ATTENTE',
            'featured' => 'boolean',
        ]);

        $validated['creerPar'] = $request->user()->id;

        $news = Actualite::create($validated);

        return response()->json([
            'success' => true,
            'data' => $news,
            'message' => 'News created successfully'
        ], 201);
    }

    /**
     * Update the specified news
     */
    public function update(Request $request, $id)
    {
        $news = Actualite::findOrFail($id);

        $this->authorize('update', $news);

        $validated = $request->validate([
            'titre_fr' => 'sometimes|string|max:255',
            'titre_ar' => 'sometimes|string|max:255',
            'titre_en' => 'sometimes|string|max:255',
            'description_fr' => 'sometimes|string',
            'description_ar' => 'sometimes|string',
            'description_en' => 'sometimes|string',
            'status' => 'sometimes|in:PUBLISHED,UNPUBLISHED,ARCHIVE,ATTENTE',
            'featured' => 'sometimes|boolean',
        ]);

        $validated['modifierPar'] = $request->user()->id;

        $news->update($validated);

        return response()->json([
            'success' => true,
            'data' => $news,
            'message' => 'News updated successfully'
        ]);
    }

    /**
     * Delete the specified news
     */
    public function destroy(Request $request, $id)
    {
        $news = Actualite::findOrFail($id);

        $this->authorize('delete', $news);

        $news->delete();

        return response()->json([
            'success' => true,
            'message' => 'News deleted successfully'
        ]);
    }
}
