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
        $listCategory = $this->category->getAllCategory();
        return view('admin.category.index');
    }
    public function create() {
        $listCategory = $this->category->getAllCategory();
        $recursive = new Recursive($listCategory);
        $htmlOption = $recursive->recursive();
        return view('admin.category.add', compact('listCategory', 'htmlOption'));
    }

    public function store(Request $request) {

    }
}
