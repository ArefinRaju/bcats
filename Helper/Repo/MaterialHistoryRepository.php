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
        return MaterialHistory::where('material_id', $materialId)->orderBy('id', 'desc')->first();
    }

    public function getLastRecord(Request $request, int $materialId, int $projectId)
    {
        return MaterialHistory::where('material_id', $materialId)
                              ->where('project_id', $projectId)
                              ->orderBy('id', 'desc')->first();
    }

    public function list(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
                              ->orderBy('id', 'desc')
                              ->paginate($perPage, ['*'], 'page', $page);
    }
    public function matrilsListWithCategory(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
        ->whereNotNull('used')
        ->leftJoin('materials','material_histories.material_id','materials.id')
        ->select('material_histories.id as material_histories_id','name','material_name','total','used','enum')
                              ->orderBy('material_histories.id', 'desc')
                              ->paginate($perPage, ['*'], 'page', $page);
    }

    public function debitList(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
                              ->leftJoin('materials','material_histories.material_id','materials.id')
                              ->whereNotIn('debit', [0.00])
                              ->orderBy('material_histories.id', 'desc')
                              ->paginate($perPage, ['*'], 'page', $page);
    }

    public function creditList(int $perPage = null, int $page = null)
    {
        return MaterialHistory::where('project_id', Request()->user()->project_id)
                              ->whereNotIn('credit', [0.00])
                              ->orderBy('id', 'desc')
                              ->paginate($perPage, ['*'], 'page', $page);
    }
}
