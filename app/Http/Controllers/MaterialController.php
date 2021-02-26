<?php


namespace App\Http\Controllers;

use App\Models\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Constants\Enum;
use Helper\Core\HelperController;
use Helper\Repo\MaterialRepository;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MaterialController extends HelperController
{
    protected array            $commonValidationRules;
    private MaterialRepository $repo;

    public function __construct(MaterialRepository $repo)
    {
        $this->repo = $repo;
        $this->setResource(Material::class);
        $this->commonValidationRules = [
            'name' => [V::REQUIRED, V::TEXT],
            'enum' => [V::REQUIRED, V::TEXT, Rule::in(Enum::values())],
        ];
    }

    public function create(Request $request, string $action = null)
    {
        $material = $this->validateCherryPickAndAssign($request, $this->commonValidationRules, new Material());
        $this->repo->save($material);
        dd($material->toArray());
    }
}