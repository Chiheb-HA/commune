<?php

namespace App\Services;

use App\Models\CitizenRequest;
use App\Models\MunicipalService;

class CitizenRequestService
{
    public function createRequest($userId, $serviceId, $data)
    {
        return CitizenRequest::create([
            'user_id' => $userId,
            'service_id' => $serviceId,
            'description_fr' => $data['description_fr'] ?? null,
            'description_en' => $data['description_en'] ?? null,
            'description_ar' => $data['description_ar'] ?? null,
            'priority' => $data['priority'] ?? 'medium',
            'status' => 'pending',
        ]);
    }

    public function getUserRequests($userId, $perPage = 15)
    {
        return CitizenRequest::where('user_id', $userId)
            ->with(['service', 'assignedTo'])
            ->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getAllRequests($status = null, $perPage = 15)
    {
        $query = CitizenRequest::with(['citizen', 'service', 'assignedTo']);

        if ($status) {
            $query->where('status', $status);
        }

        return $query->orderBy('created_at', 'desc')
            ->paginate($perPage);
    }

    public function getByNumber($requestNumber)
    {
        return CitizenRequest::with(['citizen', 'service', 'assignedTo', 'documents', 'messages'])
            ->where('request_number', $requestNumber)
            ->first();
    }

    public function updateStatus(CitizenRequest $request, $status)
    {
        return $request->update(['status' => $status]);
    }

    public function assign(CitizenRequest $request, $officialId)
    {
        return $request->update([
            'assigned_to' => $officialId,
            'assigned_at' => now(),
            'status' => 'in_progress',
        ]);
    }

    public function complete(CitizenRequest $request)
    {
        return $request->update([
            'status' => 'completed',
            'completed_at' => now(),
        ]);
    }

    public function getStatistics()
    {
        return [
            'total' => CitizenRequest::count(),
            'pending' => CitizenRequest::where('status', 'pending')->count(),
            'in_progress' => CitizenRequest::where('status', 'in_progress')->count(),
            'completed' => CitizenRequest::where('status', 'completed')->count(),
            'rejected' => CitizenRequest::where('status', 'rejected')->count(),
        ];
    }
}
