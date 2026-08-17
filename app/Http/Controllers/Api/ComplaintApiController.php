<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reclamation;
use Illuminate\Http\Request;

class ComplaintApiController extends Controller
{
    /**
     * Display a listing of complaints (for authorized users)
     */
    public function index(Request $request)
    {
        $this->authorize('viewAny', Reclamation::class);

        $query = Reclamation::query();

        // Filter by status
        if ($request->input('status')) {
            $query = $query->where('Etat', $request->input('status'));
        }

        // Filter by priority
        if ($request->input('priority')) {
            $query = $query->where('Priorite', $request->input('priority'));
        }

        // Filter by date range
        if ($request->input('from_date')) {
            $query = $query->where('DateReclamation', '>=', $request->input('from_date'));
        }
        if ($request->input('to_date')) {
            $query = $query->where('DateReclamation', '<=', $request->input('to_date'));
        }

        $complaints = $query->latest()
            ->paginate($request->input('per_page', 15));

        return response()->json([
            'success' => true,
            'data' => $complaints->items(),
            'pagination' => [
                'current_page' => $complaints->currentPage(),
                'last_page' => $complaints->lastPage(),
                'per_page' => $complaints->perPage(),
                'total' => $complaints->total(),
            ]
        ]);
    }

    /**
     * Store a newly created complaint
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'sujet' => 'required|string|max:255',
            'text_message' => 'required|string|min:10',
            'citoyen_id' => 'nullable|exists:citoyens,id',
            'priorite' => 'required|in:haute,moyenne,faible',
            'attachments' => 'nullable|array|max:3',
            'attachments.*' => 'file|max:5120',
        ]);

        // Handle attachments
        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $file) {
                $attachments[] = $file->store('complaints', 'public');
            }
        }

        $validated['CodeReclamation'] = Reclamation::generateCode();
        $validated['TextMessage'] = $validated['text_message'];
        $validated['DateReclamation'] = now();
        $validated['creerPar'] = $request->user()?->id;
        $validated['PiecesJointes'] = $attachments ?: null;

        unset($validated['text_message']);

        $complaint = Reclamation::create($validated);

        return response()->json([
            'success' => true,
            'data' => $complaint,
            'message' => 'Complaint submitted successfully'
        ], 201);
    }

    /**
     * Display the specified complaint
     */
    public function show($id)
    {
        $complaint = Reclamation::findOrFail($id);

        // Check authorization
        if (!$this->canView($complaint)) {
            return response()->json([
                'success' => false,
                'message' => 'Unauthorized'
            ], 403);
        }

        return response()->json([
            'success' => true,
            'data' => $complaint
        ]);
    }

    /**
     * Update the specified complaint
     */
    public function update(Request $request, $id)
    {
        $complaint = Reclamation::findOrFail($id);

        $this->authorize('update', $complaint);

        $validated = $request->validate([
            'sujet' => 'sometimes|string|max:255',
            'text_message' => 'sometimes|string|min:10',
            'priorite' => 'sometimes|in:haute,moyenne,faible',
            'etat' => 'sometimes|in:0,1', // Open, Closed
            'reponse_admin' => 'sometimes|string',
        ]);

        if (isset($validated['text_message'])) {
            $validated['TextMessage'] = $validated['text_message'];
            unset($validated['text_message']);
        }

        $validated['Etat'] = $validated['etat'] ?? $complaint->Etat;
        $validated['ReponseAdmin'] = $validated['reponse_admin'] ?? $complaint->ReponseAdmin;
        $validated['modifierPar'] = $request->user()->id;

        if ($validated['Etat'] == 1 && $complaint->Etat == 0) {
            $validated['DateTraitement'] = now();
            $validated['traiterPar'] = $request->user()->id;
        }

        $complaint->update($validated);

        return response()->json([
            'success' => true,
            'data' => $complaint,
            'message' => 'Complaint updated successfully'
        ]);
    }

    /**
     * Check if user can view complaint
     */
    private function canView(Reclamation $complaint)
    {
        // Implement your authorization logic
        return true;
    }
}
