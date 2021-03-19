<?php


namespace Helper\Repo;


use App\Models\MaterialHistory;
use Illuminate\Http\Request;

class MaterialHistoryRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(MaterialHistory::class);
    }

    public function getLastRecord(Request $request, int $materialId, int $projectId)
    {
        return MaterialHistory::where('material_id', $materialId)
                              ->where('project_id', $projectId)
                              ->latest()->first();
    }
}