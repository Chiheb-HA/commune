<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AssociationRequest;
use Illuminate\Http\Request;

class AssociationRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->query('status');

        $requests = AssociationRequest::with('association')
            ->when($status, function ($query) use ($status) {
                $query->where('status', $status);
            })
            ->latest()
            ->paginate(15)
            ->withQueryString();

        return view('admin.association-requests.index', compact('requests', 'status'));
    }

    public function show(AssociationRequest $associationRequest)
    {
        $associationRequest->load('association');

        return view('admin.association-requests.show', ['requestItem' => $associationRequest]);
    }

    public function update(Request $request, AssociationRequest $associationRequest)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_review,answered',
            'response' => 'nullable|string',
        ]);

        if (!empty($validated['response']) && $associationRequest->status !== 'answered' && $validated['status'] === 'answered') {
            $validated['responded_at'] = now();
        } elseif (!empty($validated['response']) && !$associationRequest->responded_at) {
            $validated['responded_at'] = now();
        }

        $associationRequest->update($validated);

        return redirect()->route('admin.association-requests.index')
            ->with('success', __('messages.association_request_updated_successfully'));
    }

    public function destroy(AssociationRequest $associationRequest)
    {
        $associationRequest->delete();

        return redirect()->route('admin.association-requests.index')
            ->with('success', __('messages.association_request_deleted_successfully'));
    }
}
