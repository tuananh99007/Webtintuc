<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function roles()
    {
        return
            $this->belongsToMany(Role::class, 'user_role', 'user_id', 'role_id');
    }

    public function product()
    {
        return
            $this->hasMany(Product::class, 'id', 'user_id');
    }

    public function checkPermissionUserList()
    {
        $permission = $this->getPermission();
        return in_array('list_user', $permission);
    }

    private function getPermission()
    {
        $roles = $this->roles;
        foreach ($roles as $item) {
            $permission[] = $item->permissions->pluck('name')->toArray();
        }
        return array_merge(...$permission);
    }

    public function checkPermissionUserAdd()
    {
        $permission = $this->getPermission();
        return in_array('add_user', $permission);
    }

    public function checkPermissionUserUpdate()
    {
        $permission = $this->getPermission();
        return in_array('update_user', $permission);
    }

    public function checkPermissionUserDelete()
    {
        $permission = $this->getPermission();
        return in_array('delete_user', $permission);
    }

    public function checkPermissionUserDetail()
    {
        $permission = $this->getPermission();
        return in_array('detail_user', $permission);
    }

    public function checkPermissionUserRestore()
    {
        $permission = $this->getPermission();
        return in_array('restore_user', $permission);
    }

    public function checkPermissionUserRestoreAll()
    {
        $permission = $this->getPermission();
        return in_array('restoreAll_user', $permission);
    }

    public function checkPermissionUserPermanentlyDeleted()
    {
        $permission = $this->getPermission();
        return in_array('permanentlyDeleted_user', $permission);
    }

    public function checkPermissionCategoryList()
    {
        $permission = $this->getPermission();
        return in_array('list_category', $permission);
    }

    public function checkPermissionCategoryAdd()
    {
        $permission = $this->getPermission();
        return in_array('add_category', $permission);
    }

    public function checkPermissionCategoryUpdate()
    {
        $permission = $this->getPermission();
        return in_array('update_category', $permission);
    }

    public function checkPermissionCategoryDetail()
    {
        $permission = $this->getPermission();
        return in_array('detail_category', $permission);
    }

    public function checkPermissionCategoryDelete()
    {
        $permission = $this->getPermission();
        return in_array('delete_category', $permission);
    }

    public function checkPermissionCategoryRestore()
    {
        $permission = $this->getPermission();
        return in_array('restore_category', $permission);
    }

    public function checkPermissionCategoryRestoreAll()
    {
        $permission = $this->getPermission();
        return in_array('restoreAll_category', $permission);
    }

    public function checkPermissionCategoryPermanentlyDeleted()
    {
        $permission = $this->getPermission();
        return in_array('permanentlyDeleted_category', $permission);
    }

    public function checkPermissionCategoryPermanentlyDeletedAll()
    {
        $permission = $this->getPermission();
        return in_array('permanentlyDeletedAll_category', $permission);
    }

    public function checkPermissionProductList()
    {
        $permission = $this->getPermission();
        return in_array('list_product', $permission);
    }

    public function checkPermissionProductAdd()
    {
        $permission = $this->getPermission();
        return in_array('add_product', $permission);
    }

    public function checkPermissionProductUpdate()
    {
        $permission = $this->getPermission();
        return in_array('update_product', $permission);
    }

    public function checkPermissionProductDelete()
    {
        $permission = $this->getPermission();
        return in_array('delete_product', $permission);
    }

    public function checkPermissionProductDetail()
    {
        $permission = $this->getPermission();
        return in_array('detail_product', $permission);
    }

    public function checkPermissionProductRestore()
    {
        $permission = $this->getPermission();
        return in_array('restore_product', $permission);
    }

    public function checkPermissionProductRestoreAll()
    {
        $permission = $this->getPermission();
        return in_array('restoreAll_product', $permission);
    }

    public function checkPermissionProductPermanentlyDeleted()
    {
        $permission = $this->getPermission();
        return in_array('permanentlyDeleted_product', $permission);
    }

    public function checkPermissionProductPermanentlyDeletedAll()
    {
        $permission = $this->getPermission();
        return in_array('permanentlyDeletedAll_product', $permission);
    }

    public function checkPermissionPermissionList()
    {
        $permission = $this->getPermission();
        return in_array('list_permission', $permission);
    }

    public function checkPermissionPermissionAdd()
    {
        $permission = $this->getPermission();
        return in_array('add_permission', $permission);
    }

    public function checkPermissionPermissionUpdate()
    {
        $permission = $this->getPermission();
        return in_array('update_permission', $permission);
    }

    public function checkPermissionPermissionDelete()
    {
        $permission = $this->getPermission();
        return in_array('delete_permission', $permission);
    }

    public function checkPermissionRoleList()
    {
        $permission = $this->getPermission();
        return in_array('list_role', $permission);
    }

    public function checkPermissionRoleAdd()
    {
        $permission = $this->getPermission();
        return in_array('add_role', $permission);
    }

    public function checkPermissionRoleUpdate()
    {
        $permission = $this->getPermission();
        return in_array('update_role', $permission);
    }

    public function checkPermissionRoleDelete()
    {
        $permission = $this->getPermission();
        return in_array('delete_role', $permission);
    }
}

