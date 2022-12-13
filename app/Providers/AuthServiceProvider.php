<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
//         'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];


    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('list_user', function (User $user) {
            return $user->checkPermissionUserList();
        });

        Gate::define('add_user', function (User $user) {
            return $user->checkPermissionUserAdd();
        });

        Gate::define('update_user', function (User $user) {
            return $user->checkPermissionUserUpdate();
        });

        Gate::define('delete_user', function (User $user) {
            return $user->checkPermissionUserDelete();
        });

        Gate::define('detail_user', function (User $user) {
            return $user->checkPermissionUserDetail();
        });

        Gate::define('restore_user', function (User $user) {
            return $user->checkPermissionUserRestore();
        });

        Gate::define('restoreAll_user', function (User $user) {
            return $user->checkPermissionUserRestoreAll();
        });

        Gate::define('permanentlyDeleted_user', function (User $user) {
            return $user->checkPermissionUserPermanentlyDeleted();
        });


        Gate::define('list_category', function (User $user) {
            return $user->checkPermissionCategoryList();
        });

        Gate::define('add_category', function (User $user) {
            return $user->checkPermissionCategoryAdd();
        });

        Gate::define('update_category', function (User $user) {
            return $user->checkPermissionCategoryUpdate();
        });

        Gate::define('delete_category', function (User $user) {
            return $user->checkPermissionCategoryDelete();
        });

        Gate::define('detail_category', function (User $user) {
            return $user->checkPermissionCategoryDetail();
        });

        Gate::define('restore_category', function (User $user) {
            return $user->checkPermissionCategoryRestore();
        });

        Gate::define('restoreAll_category', function (User $user) {
            return $user->checkPermissionCategoryRestoreAll();
        });

        Gate::define('permanentlyDeleted_category', function (User $user) {
            return $user->checkPermissionCategoryPermanentlyDeleted();
        });

        Gate::define('permanentlyDeletedAll_category', function (User $user) {
            return $user->checkPermissionCategoryPermanentlyDeletedAll();
        });

        Gate::define('list_product', function (User $user) {
            return $user->checkPermissionProductList();
        });

        Gate::define('add_product', function (User $user) {
            return $user->checkPermissionProductAdd();
        });

        Gate::define('update_product', function (User $user) {
            return $user->checkPermissionProductUpdate();
        });

        Gate::define('delete_product', function (User $user) {
            return $user->checkPermissionProductDelete();
        });

        Gate::define('detail_product', function (User $user) {
            return $user->checkPermissionProductDetail();
        });

        Gate::define('restore_product', function (User $user) {
            return $user->checkPermissionProductRestore();
        });

        Gate::define('restoreAll_product', function (User $user) {
            return $user->checkPermissionProductRestoreAll();
        });

        Gate::define('permanentlyDeleted_product', function (User $user) {
            return $user->checkPermissionProductPermanentlyDeleted();
        });

        Gate::define('permanentlyDeletedAll_product', function (User $user) {
            return $user->checkPermissionProductPermanentlyDeletedAll();
        });

        Gate::define('list_permission', function (User $user) {
            return $user->checkPermissionPermissionList();
        });

        Gate::define('add_permission', function (User $user) {
            return $user->checkPermissionPermissionAdd();
        });

        Gate::define('update_permission', function (User $user) {
            return $user->checkPermissionPermissionUpdate();
        });

        Gate::define('delete_permission', function (User $user) {
            return $user->checkPermissionPermissionDelete();
        });

        Gate::define('list_role', function (User $user) {
            return $user->checkPermissionRoleList();
        });

        Gate::define('add_role', function (User $user) {
            return $user->checkPermissionRoleAdd();
        });

        Gate::define('update_role', function (User $user) {
            return $user->checkPermissionRoleUpdate();
        });

        Gate::define('delete_role', function (User $user) {
            return $user->checkPermissionRoleDelete();
        });
    }
}
