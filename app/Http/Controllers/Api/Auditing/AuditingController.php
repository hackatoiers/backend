<?php

namespace App\Http\Controllers\Api\Auditing;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Auditing\AuditingResource;
use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;
class AuditingController extends Controller
{
     public function index(Request $request)
    {
        // Paginação + filtros opcionais
        $query = Audit::with('user')->orderBy('id', 'desc');

        if ($request->has('event')) {
            $query->where('event', $request->event);
        }

        if ($request->has('model')) {
            $query->where('auditable_type', $request->model);
        }

        if ($request->has('id')) {
            $query->where('auditable_id', $request->id);
        }

        return AuditingResource::collection(
            $query->paginate($request->per_page ?? 15)
        );
    }
     public function show($id)
    {
        $audit = Audit::with('user')->findOrFail($id);

        return new AuditingResource($audit);
    }
}

