<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return response()->json($request->user());
    });
});

// Public API Routes
Route::prefix('articles')->group(function () {
    Route::get('/', function () {
        return response()->json(\App\Models\Article::published()->paginate());
    });

    Route::get('/{id}', function ($id) {
        $article = \App\Models\Article::published()->find($id);
        return $article ? response()->json($article) : response()->json(['error' => 'Not found'], 404);
    });
});

Route::prefix('events')->group(function () {
    Route::get('/', function () {
        return response()->json(\App\Models\Event::published()->upcoming()->paginate());
    });

    Route::get('/{id}', function ($id) {
        $event = \App\Models\Event::published()->find($id);
        return $event ? response()->json($event) : response()->json(['error' => 'Not found'], 404);
    });
});

Route::prefix('news')->group(function () {
    Route::get('/', function () {
        return response()->json(\App\Models\News::published()->paginate());
    });

    Route::get('/{id}', function ($id) {
        $news = \App\Models\News::published()->find($id);
        return $news ? response()->json($news) : response()->json(['error' => 'Not found'], 404);
    });
});

// Protected API Routes
Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('requests')->group(function () {
        Route::post('/', function (Request $request) {
            $validated = $request->validate([
                'service_id' => 'required|exists:municipal_services,id',
                'description_fr' => 'nullable|string',
                'description_en' => 'nullable|string',
                'description_ar' => 'nullable|string',
            ]);

            $citizenRequest = \App\Models\CitizenRequest::create([
                'user_id' => $request->user()->id,
                ...$validated,
                'status' => 'pending',
            ]);

            return response()->json($citizenRequest, 201);
        });

        Route::get('/', function (Request $request) {
            return response()->json(
                \App\Models\CitizenRequest::where('user_id', $request->user()->id)
                    ->paginate()
            );
        });

        Route::get('/{id}', function (Request $request, $id) {
            $citizenRequest = \App\Models\CitizenRequest::where('user_id', $request->user()->id)->find($id);
            return $citizenRequest ? response()->json($citizenRequest) : response()->json(['error' => 'Not found'], 404);
        });
    });

    Route::prefix('complaints')->group(function () {
        Route::post('/', function (Request $request) {
            $validated = $request->validate([
                'category' => 'required|in:infrastructure,services,staff,cleanliness,security,other',
                'description_fr' => 'required|string',
                'description_en' => 'required|string',
                'description_ar' => 'required|string',
                'location' => 'nullable|string',
            ]);

            $complaint = \App\Models\Complaint::create([
                'user_id' => $request->user()->id,
                ...$validated,
                'status' => 'new',
            ]);

            return response()->json($complaint, 201);
        });

        Route::get('/', function (Request $request) {
            return response()->json(
                \App\Models\Complaint::where('user_id', $request->user()->id)
                    ->paginate()
            );
        });

        Route::get('/{id}', function (Request $request, $id) {
            $complaint = \App\Models\Complaint::where('user_id', $request->user()->id)->find($id);
            return $complaint ? response()->json($complaint) : response()->json(['error' => 'Not found'], 404);
        });
    });
});
