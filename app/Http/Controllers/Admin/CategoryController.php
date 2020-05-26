<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use App\Components\Recursive;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function index() {
        $listCategory = $this->category->getCategoryPaginate();
        return view('admin.category.index', compact('listCategory'));
    }
    public function create() {
        $htmlOption = $this->getCategory($parent_id = '');
        return view('admin.category.add', compact('listCategory', 'htmlOption'));
    }

    public function store(Request $request) {
        $input = $request->all();
        $input['slug'] = str_slug($input['name']);
        $this->category->create($input);
        return redirect()->route('categories.index');
    }

    public function edit($id) {
        $category = $this->category->findOrFail($id);
        $htmlOption = $this->getCategory($category->parent_id);
        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    public function update(Request $request, $id) {
        $category = $this->category->findOrFail($id);
        $input = $request->all();
        $input['slug'] = str_slug($input['name']);
        $category->update($input);
        return back()->with('success', 'Updated successfully');
    }
    public function delete($id) {
        $category = $this->category->findOrFail($id);
        $category->delete();
        return back()->with('success', 'Delete successfully');
    }

    public function getCategory($parent_id) {
        $listCategory = $this->category->getAllCategory();
        $recursive = new Recursive($listCategory);
        $htmlOption = $recursive->recursive($parent_id);
        return $htmlOption;
    }
}
