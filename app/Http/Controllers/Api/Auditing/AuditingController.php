<?php

namespace App\Http\Controllers\Api\Auditing;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Auditing\AuditingResource;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

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

    // Audits por url
    public function forModel(Request $request, string $model)
    {
        // Mapear a rota amigável para a classe real
        $modelMap = [
            'users' => \App\Models\User::class,
            'item' => \App\Models\Item::class,
            'photos' => \App\Models\Photo::class,
            'collections' => \App\Models\Collection::class,
            'ethinic-group' => \App\Models\EthnicGroup::class,
            'conservation-action' => \App\Models\ConservationAction::class,
            'material-subtype' => \App\Models\Subtype::class,
            'location' => \App\Models\Location::class,
            'material' => \App\Models\Material::class,
        ];

        if (! isset($modelMap[$model])) {
            return response()->json([
                'message' => 'Model not found for auditing.',
            ], 404);
        }

        $auditableType = $modelMap[$model];

        $query = Audit::with('user')
            ->where('auditable_type', $auditableType)
            ->orderBy('id', 'desc');

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
