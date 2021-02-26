<?php


namespace App\Http\Controllers;

use App\Models\Material;
use Helper\Constants\CommonValidations as V;
use Helper\Core\HelperController;
use Helper\Repo\MaterialRepository;

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
            'enum' => [V::REQUIRED, V::TEXT],
        ];
    }
}