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

    public function getById(Request $request, int $id)
    {
        return MaterialHistory::where('id', $id)->first();
    }

    public function getLatestById(Request $request, int $materialId)
    {
        return MaterialHistory::where('material_id', $materialId)->latest()->first();
    }

    public function getLastRecord(Request $request, int $materialId, int $projectId)
    {
        return MaterialHistory::where('material_id', $materialId)
                              ->where('project_id', $projectId)
                              ->latest()->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
                              ->latest()
                              ->paginate($perPage, ['*'], 'page', $page);
    }

    public function debitList(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
                              ->whereNotIn('debit', [0.00])
                              ->latest()
                              ->paginate($perPage, ['*'], 'page', $page);
    }
}