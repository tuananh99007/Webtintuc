<?php

namespace App\Repositories\Interface;

interface CategoryRepositoryInterface


{
    public function categoryList();

    public function categoryInsert($name, $hot_flag);

    public function categoryID($id);

    public function categoryUpdate($id, $name, $hot_flag);

    public function categoryDelete($id);

    public function categoryDetailBin();

    public function categoryRestore($id);

    public function categoryRestoreAll();

    public function categoryPermanentlyDeleted($id);

    public function categoryPermanentlyDeletedAll();

}
