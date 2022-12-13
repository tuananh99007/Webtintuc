<?php

namespace App\Providers;

use App\Repositories\AuthenticateRepositoryUsers;
use App\Repositories\CategoryRepository;
use App\Repositories\HomeRepository;
use App\Repositories\Interface\AuthenticateRepositoryInterfaceUsers;
use App\Repositories\Interface\CategoryRepositoryInterface;
use App\Repositories\Interface\HomeRepositoryInterface;
use App\Repositories\Interface\PermissionRepositoryInterface;
use App\Repositories\Interface\ProductsRepositoryInterface;
use App\Repositories\Interface\RoleRepositoryInterface;
use App\Repositories\Interface\UsersRepositoryInterface;
use App\Repositories\PermissionRepository;
use App\Repositories\ProductsRepository;
use App\Repositories\RoleRepository;
use App\Repositories\UsersRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public array $bindings = [
        CategoryRepositoryInterface::class => CategoryRepository::class,
        ProductsRepositoryInterface::class => ProductsRepository::class,
        UsersRepositoryInterface::class => UsersRepository::class,
        RoleRepositoryInterface::class => RoleRepository::class,
        PermissionRepositoryInterface::class => PermissionRepository::class,
        AuthenticateRepositoryInterfaceUsers::class => AuthenticateRepositoryUsers::class,
        HomeRepositoryInterface::class => HomeRepository::class
        // key => value
    ];

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
