<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\ProductsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProductsController extends Controller
{
    private $productsRepository;
    private $categoryRepository;

    public function __construct(ProductsRepositoryInterface $inputprodcutsRepository,
                                CategoryRepositoryInterface $inputcategoryRepository,
    )
    {
        $this->productsRepository = $inputprodcutsRepository;
        $this->categoryRepository = $inputcategoryRepository;
    }


    public function list()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('list_product');
        if (!$check) {
            abort(403);
        }
        $productsList = $this->productsRepository->productsList();

        return view('admin.product.list', compact('productsList'));
    }

    public function add()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('add_product');
        if (!$check) {
            abort(403);
        }
        $usersLogin = Auth::guard('admin')->user();
        $categorysList = $this->categoryRepository->categoryList();
        return view('admin.product.add', compact('categorysList', 'usersLogin'));
    }

    public function postadd(Request $request)
    {
        $this->validatePostAdd($request);
        $usersLogin = Auth::guard('admin')->user();
        $name = $request->input('name', null);
        $title = $request->input('title', null);
        $content = $request->input('content', null);
        $post_time = $request->input('post_time', null);
        $user_id = $request->input('user_id', null);
        if ($user_id == null) {
            $user_id = $usersLogin->id;
        }
        $image = $request->file('image', null);
        if (empty($image) != true) {
            $nameImage = $image->hashName();
            $urlImage = "/upload/products/" . $nameImage;
            $image->store('upload/products');
        }
        $category_id = $request->input('category_id', null);
        $this->productsRepository->productInsert($name, $title, $content, $post_time, $user_id, $urlImage, $category_id);
        return redirect()->route('admin.product.list');
    }

    private function validatePostAdd($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:255',
            'content' => 'required|min:1|max:1000',
            'image' => 'required',
            'category_id' => 'required',
        ]);
    }

    public function update(Request $request, Product $product)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('update_product');
        if (!$check) {
            abort(403);
        }
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $categorysList = $this->categoryRepository->categoryList();
        $productId = $this->productsRepository->productId($id);
        return view('admin.product.update', compact('productId', 'categorysList', 'userLogin'));
    }

    public function postupdate(Request $request)
    {
        $this->validatePostUpdate($request);
        $userLogin = Auth::guard('admin')->user();
        $id = $request->input('id', null);
        $name = $request->input('name', null);
        $title = $request->input('title', null);
        $productId = $this->productsRepository->productId($id);
        $content = $request->input('content', null);
        if (empty($content) == true) {
            $content = $productId->content;
        }
        $post_time = $request->input('post_time', null);
        $user_id = $request->input('user_id', null);
        if (empty($user_id)) {
            $user_id = $userLogin->id;
        }
        $image = $request->file('image');
        if (empty($image) != true) {
            // Storage::delete($productId->image);
            $nameImage = $image->hashName();
            $urlImage = "/upload/products/" . $nameImage;
            $image->store('upload/products');
        } else {
            $urlImage = $productId->image;
        }
        $category_id = $request->input('category_id', null);
        $this->productsRepository->productUpdate($id, $name, $title, $content, $post_time, $user_id, $urlImage, $category_id);
        return redirect()->back()->withInput();
    }

    private function validatePostUpdate($request)
    {
        $request->validate([
            'name' => 'required|min:1|max:255',
            'title' => 'required|min:1|max:255',
        ]);
    }

    public function detail(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('detail_product');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $productId = $this->productsRepository->productId($id);
        $commentsId = $this->productsRepository->commentsId($id);
        $objects = (object)$commentsId;
        return view('admin.product.detail', compact('productId', 'objects'));
    }

    public function delete(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('delete_product');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->productsRepository->productDelete($id);
        return redirect()->route('admin.product.list');
    }

    public function detailBin()
    {
        $productsDetailBin = $this->productsRepository->productDetailBin();
        return view('admin.product.detailBin', compact('productsDetailBin'));
    }

    public function restore(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restore_product');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->productsRepository->productRestore($id);
        return redirect()->route('admin.product.detailBin');
    }

    public function restoreAll()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('restoreAll_product');
        if (!$check) {
            abort(403);
        }
        $this->productsRepository->productRestoreAll();
        return redirect()->route('admin.product.detailBin');
    }

    public function permanentlyDeleted(Request $request)
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('permanentlyDeleted_product');
        if (!$check) {
            abort(403);
        }
        $id = $request->input('id', null);
        $this->productsRepository->productPermanentlyDeleted($id);
        return redirect()->route('admin.product.detailBin');
    }

    public function permanentlyDeletedAll()
    {
        Auth::shouldUse('admin');
        $check = Gate::allows('permanentlyDeletedAll_product');
        if (!$check) {
            abort(403);
        }
        $this->productsRepository->productPermanentlyDeletedAll();
        return redirect()->route('admin.product.detailBin');
    }

    public function deleteComment(Request $request)
    {
        $id = $request->input('product_id', null);
        $this->productsRepository->deleteComment($id);
        return redirect()->back()->withInput();
    }
}
