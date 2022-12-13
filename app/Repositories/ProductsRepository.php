<?php

namespace App\Repositories;


use App\Repositories\Interface\ProductsRepositoryInterface;
use Illuminate\Support\Facades\DB;

class ProductsRepository implements ProductsRepositoryInterface
{
    public function productsList()
    {
        return
            DB::table('product')
                ->select(
                    'product.id',
                    'product.title',
                    'product.content',
                    'product.post_time',
                    'product.is_deleted',
                    'product.image',
                    'product.user_id',
                    'category.name as category_name',
                    'product.name'
                )
                ->join('category', 'product.category_id', '=', 'category.id')
                ->where('category.is_deleted', 0)
                ->where('product.is_deleted', 0)
                ->paginate(5);
    }


    public function productInsert($name, $title, $content, $post_time, $user_id, $urlImage, $category_id)
    {
        return
            DB::table('product')->insert([
                'name' => $name,
                'title' => $title,
                'content' => $content,
                'post_time' => $post_time,
                'user_id' => $user_id,
                'image' => $urlImage,
                'category_id' => $category_id,
            ]);
    }

    public function productId($id)
    {
        return
            DB::table('product')
                ->select(
                    'product.id',
                    'product.title',
                    'product.content',
                    'product.post_time',
                    'product.is_deleted',
                    'product.image',
                    'product.user_id',
                    'category.name as category_name',
                    'product.name',
                    'product.category_id',
                    'product.author'
                )
                ->join('category', 'product.category_id', '=', 'category.id')
                ->where('product.id', $id)
                ->first();
    }

    public function productUpdate($id, $name, $title, $content, $post_time, $user_id, $urlImage, $category_id)
    {
        return
            DB::table('product')->where('id', $id)->update([
                'id' => $id,
                'name' => $name,
                'title' => $title,
                'content' => $content,
                'post_time' => $post_time,
                'user_id' => $user_id,
                'image' => $urlImage,
                'category_id' => $category_id,
            ]);
    }

    public function commentsId($id)
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
                ->get()->toArray();
    }

    public function productDelete($id)
    {
        return
            DB::table('product')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 1
                ]);
    }

    public function productDetailBin()
    {
        return
            DB::table('product')
                ->select(
                    'product.id',
                    'product.title',
                    'product.content',
                    'product.post_time',
                    'product.is_deleted',
                    'product.image',
                    'product.user_id',
                    'category.name as category_name'
                )
                ->join('category', 'product.category_id', '=', 'category.id')
                ->where('product.is_deleted', 1)
                ->paginate(10);
    }

    public function productRestore($id)
    {
        return
            DB::table('product')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function productRestoreAll()
    {
        return
            DB::table('product')
                ->where('is_deleted', 1)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function productPermanentlyDeleted($id)
    {
        return
            DB::table('product')
                ->where('id', $id)
                ->delete();
    }

    public function productPermanentlyDeletedAll()
    {
        return
            DB::table('product')
                ->where('is_deleted', 1)
                ->delete();
    }

    public function deleteComment($id)
    {
        return
            DB::table('comment')
                ->where('id', $id)
                ->delete();
    }
}
