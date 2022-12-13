<?php

namespace App\Repositories\Interface;

interface HomeRepositoryInterface

{
    public function productsHot_flag01();

    public function productsHot_flag02();

    public function homeSimilarPosts($productDetail);

    public function homePostcommnet($content, $userLogin, $product_id);

    public function homeDeleteComment($id);

    public function homeProductList($category_id);

    public function homeCommentList($id);
}
