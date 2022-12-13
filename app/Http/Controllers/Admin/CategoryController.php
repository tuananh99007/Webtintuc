<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryRepositoryInterface $inputcategoryRepository)
    {
        $this->categoryRepository = $inputcategoryRepository;
    }

    public function list()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('list_user');
        if (!$check) {
            abort(403);
        }
        $categorysList = $this->categoryRepository->categoryList();
        return view('admin.category.list', compact('categorysList'));
    }

    public function add()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('add_category');
        if (!$check) {
            abort(403);
        }
        return view('admin.category.add');
    }

    public function postadd(Request $request)
    {
        $this->validateName($request);
        $name = $request->input('name', null);
        $hot_flag = $request->input('hot_flag', null);
        $this->categoryRepository->categoryInsert($name, $hot_flag);
        return redirect()->route('admin.category.list');
    }

    private function validateName($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'hot_flag' => 'max:255'
        ]);
    }

    public function update(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('update_category');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $categoryID = $this->categoryRepository->categoryID($id);
        return view('admin.category.update', compact('categoryID'));
    }

    public function postupdate(Request $request)
    {
        $this->validateName($request);
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $hot_flag = $request->input('hot_flag', null);
        $this->categoryRepository->categoryUpdate($id, $name, $hot_flag);
        return redirect()->route('admin.category.list');
    }

    public function detail(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('detail_category');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $categoryID = $this->categoryRepository->categoryID($id);
        return view('admin.category.detail', compact('categoryID'));
    }

    public function delete(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('delete_category');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->categoryRepository->categoryDelete($id);
        return redirect()->route('admin.category.list');
    }

    public function detailBin()
    {
        $categorysDetailBin = $this->categoryRepository->categoryDetailBin();
        return view('admin.category.detailBin', compact('categorysDetailBin'));
    }

    public function restore(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restore_category');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->categoryRepository->categoryRestore($id);
        return redirect()->route('admin.category.detailBin');
    }

    public function restoreAll()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restoreAll_category');
        if (!$check) {
            abort(403);
        }
        $this->categoryRepository->categoryRestoreAll();
        return redirect()->route('admin.category.detailBin');
    }

    public function permanentlyDeleted(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('permanentlyDeleted_category');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->categoryRepository->categoryPermanentlyDeleted($id);
        return redirect()->route('admin.category.detailBin');
    }

    public function permanentlyDeletedAll()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('permanentlyDeletedAll_category');
        if (!$check) {
            abort(403);
        }
        $this->categoryRepository->categoryPermanentlyDeletedAll();
        return redirect()->route('admin.category.detailBin');
    }
}
