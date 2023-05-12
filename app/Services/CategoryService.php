<?php
namespace App\Services;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Client\Request;

class CategoryService {

    protected CategoryRepository $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function getListCategories()
    {
        return $this->categoryRepository->latest()->paginate();
    }

    public function createCategory(StoreCategoryRequest $request)
    {
        return $this->categoryRepository->create($request->all());
    }

    public function updateCategory(UpdateCategoryRequest $request, $id)
    {
        if ($request->mergeIfMissing([
            'status' => 0
        ]));
        return $this->categoryRepository->update($request->all(), $id);
    }

    public function delete(Category $category): ?bool
    {
        return $category->delete();
    }
}
