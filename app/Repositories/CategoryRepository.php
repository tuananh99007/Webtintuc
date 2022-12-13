<?php

namespace App\Repositories;

use App\Repositories\Interface\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function categoryList()
    {
        return
            DB::table('category')
                ->select('*')
                ->where('is_deleted', 0)
                ->paginate(10);
    }

    public function categoryInsert($name, $hot_flag)
    {
        return
            DB::table('category')
                ->insert([
                    'name' => $name,
                    'hot_flag' => $hot_flag
                ]);
    }

    public function categoryID($id)
    {
        return
            DB::table('category')
                ->where('id', $id)
                ->first();
    }

    public function categoryUpdate($id, $name, $hot_flag)
    {
        return
            DB::table('category')
                ->where('id', $id)
                ->update([
                    'name' => $name,
                    'hot_flag' => $hot_flag,
                ]);
    }

    public function categoryDelete($id)
    {
        return
            DB::table('category')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 1
                ]);
    }

    public function categoryDetailBin()
    {
        return
            DB::table('category')
                ->select('*')
                ->where('is_deleted', 1)
                ->paginate(10);
    }

    public function categoryRestore($id)
    {
        return
            DB::table('category')
                ->where('id', $id)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function categoryRestoreAll()
    {
        return
            DB::table('category')
                ->where('is_deleted', 1)
                ->update([
                    'is_deleted' => 0
                ]);
    }

    public function categoryPermanentlyDeleted($id)
    {
        return
            DB::table('category')
                ->where('id', $id)
                ->delete();
    }

    public function categoryPermanentlyDeletedAll()
    {
        return
            DB::table('category')
                ->where('is_deleted', 1)
                ->delete();
    }


}
