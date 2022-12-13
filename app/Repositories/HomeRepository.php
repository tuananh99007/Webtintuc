<?php

namespace App\Repositories;

use App\Repositories\Interface\HomeRepositoryInterface;
use Illuminate\Support\Facades\DB;

class HomeRepository implements HomeRepositoryInterface
{
    public function productsHot_flag01()
    {
        return
            DB::table('product')
                ->select('*')
                ->where('hot_flag', 1)
                ->get()->toArray();
    }

    public function productsHot_flag02()
    {
        return
            DB::table('product')
                ->select('*')
                ->where('hot_flag', 2)
                ->get()->toArray();
    }

//    bai viet tuong tu
    public function homeSimilarPosts($productDetail)
    {
        return
            DB::table('product')
                ->select(
                    'product.id',
                    'product.title',
                    'product.content',
                    'product.post_time',
                    'product.is_deleted',
                    'product.image as product_image',
                    'product.user_id',
                    'product.name',
                    'product.author',
                    'category.name as category_name'
                )
                ->join('category', 'product.category_id', '=', 'category.id')
                ->where('product.category_id', $productDetail->category_id)
                ->get()
                ->toArray();
    }

    public function homePostcommnet($content, $userLogin, $product_id)
    {
        return
            DB::table('comment')
                ->insert([
                    'content' => $content,
                    'user_id' => $userLogin->id,
                    'product_id' => $product_id,
                ]);
    }

    public function homeDeleteComment($id)
    {
        return
            DB::table('comment')
                ->where('id', $id)
                ->update(['is_deleted' => 1]);
    }

    public function homeProductList($category_id)
    {
        return
            DB::table('product')
                ->select('*')
                ->where('category_id', $category_id)
                ->get()->toArray();
    }

    public function homeCommentList($id)
    {
        return
            DB::table('comment')->select(
                'comment.id',
                'comment.content',
                'users.name as users_name',
                'comment.is_deleted',
                'users.avatar as users_avatar',
                'comment.product_id',
                'comment.user_id'
            )
                ->join('users', 'comment.user_id', '=', 'users.id')
                ->join('product', 'comment.product_id', '=', 'product.id')
                ->where('product.id', $id)
                ->where('comment.is_deleted', 0)
                ->get()->toArray();
    }

}
