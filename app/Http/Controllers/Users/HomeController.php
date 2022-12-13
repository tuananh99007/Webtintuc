<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\HomeRepositoryInterface;
use App\Repositories\Interface\ProductsRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    private $homeRepository;
    private $categoryRepository;
    private $productsRepository;

    public function __construct(HomeRepositoryInterface     $inputhomeRepository,
                                ProductsRepositoryInterface $inputprodcutsRepository,
                                CategoryRepositoryInterface $inputcategoryRepository)
    {
        $this->homeRepository = $inputhomeRepository;
        $this->productsRepository = $inputprodcutsRepository;
        $this->categoryRepository = $inputcategoryRepository;

    }

    public function index()
    {
        $userLogin = Auth::guard('users')->user();
        $categorysList = $this->categoryRepository->categoryList();
        $productsList = $this->productsRepository->productsList();
        $productsHot_flag01 = $this->homeRepository->productsHot_flag01();
        $productsHot_flag02 = $this->homeRepository->productsHot_flag02();
        return view('users.home.index', compact('categorysList',
            'productsList',
            'productsHot_flag01',
            'productsHot_flag02', 'userLogin'));
    }

    public function detail(Request $request)
    {
        $id = $request->input('id', null);
        $categorysList = $this->categoryRepository->categoryList();
        $productDetail = $this->productsRepository->productId($id);
        $similarPosts = $this->homeRepository->homeSimilarPosts($productDetail);
        $commentsList = $this->homeRepository->homeCommentList($id);
        return view('users.home.detail', compact('productDetail',
            'categorysList', 'similarPosts', 'commentsList'));
    }

    public function categoryDetail(Request $request)
    {
        $categorysList = $this->categoryRepository->categoryList();
        $category_id = $request->input('category_id', null);
        $productsList = $this->homeRepository->homeProductList($category_id);
        return view('users.home.categoryDetail', compact('productsList',
            'categorysList'));
    }

    public function postComment(Request $request)
    {
        $userLogin = Auth::guard('users')->user();
        $product_id = $request->input('product_id', null);
        $content = $request->input('content', null);
        $this->homeRepository->homePostcommnet($content, $userLogin, $product_id);
        return redirect()->back()->withInput();
    }

    public function deleteComment(Request $request)
    {
        $id = $request->input('id', null);
        $this->homeRepository->homeDeleteComment($id);
        return redirect()->back()->withInput();
    }
}
