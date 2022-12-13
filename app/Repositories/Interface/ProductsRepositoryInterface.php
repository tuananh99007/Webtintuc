<?php

namespace App\Repositories\Interface;

interface ProductsRepositoryInterface


{
    public function productsList();

    public function productInsert($name, $title, $content, $post_time, $user_id, $urlImage, $category_id);

    public function productId($id);

    public function productUpdate($id, $name, $title, $content, $post_time, $user_id, $urlImage, $category_id);

    public function commentsId($id);

    public function productDelete($id);

    public function productDetailBin();

    public function productRestore($id);

    public function productRestoreAll();

    public function productPermanentlyDeleted($id);

    public function productPermanentlyDeletedAll();

    public function deleteComment($id);

}
