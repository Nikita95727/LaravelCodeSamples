
<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {
        return response()->json($this->categoryService->getAllCategories());
    }

    public function store(CategoryRequest $request)
    {
        return response()->json($this->categoryService->createCategory($request->validated()));
    }

    public function update(CategoryRequest $request, $id)
    {
        return response()->json($this->categoryService->updateCategory($id, $request->validated()));
    }

    public function destroy($id)
    {
        $this->categoryService->deleteCategory($id);
        return response()->noContent();
    }
}
