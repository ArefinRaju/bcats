<?php


namespace Helper\Repo;


use App\Models\Material;
use Illuminate\Http\Request;

class MaterialRepository extends EntityRepository
{
    public function __construct()
    {
        parent::setEntity(Material::class);
    }

    public function getById(Request $request, int $id)
    {
        return Material::where('id', $id)->first();
    }
}