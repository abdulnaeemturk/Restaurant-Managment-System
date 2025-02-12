<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

// Interfaces
use App\RepositoryInterfaces\BaseRepositoryInterface;
use App\RepositoryInterfaces\UserRepositoryInterface;
use App\RepositoryInterfaces\RestaurantFoodRepositoryInterface;
use App\RepositoryInterfaces\RestaurantOrderRepositoryInterface;
use App\RepositoryInterfaces\RestaurantOrderDetailRepositoryInterface;
use App\RepositoryInterfaces\RestaurantFoodDetailRepositoryInterface;
use App\RepositoryInterfaces\RestaurantTableRepositoryInterface;
use App\RepositoryInterfaces\Guest\TemporaryOrderRepositoryInterface;
// setting
use App\RepositoryInterfaces\Setting\RestaurantFoodCategoryRepositoryInterface;
use App\RepositoryInterfaces\Setting\RestaurantTableLocationRepositoryInterface;
use App\RepositoryInterfaces\Setting\RestaurantLinkTableUserRepositoryInterface;
// shared
use App\RepositoryInterfaces\Shared\AttachableStructureRepositoryInterface;

// repositories
use App\Repositories\BaseRepository;
use App\Repositories\UserRepository;
use App\Repositories\RestaurantFoodRepository;
use App\Repositories\RestaurantOrderRepository;
use App\Repositories\RestaurantOrderDetailRepository;
use App\Repositories\RestaurantFoodDetailRepository;
use App\Repositories\RestaurantTableRepository;
use App\Repositories\Guest\TemporaryOrderRepository;
// setting
use App\Repositories\Setting\RestaurantFoodCategoryRepository;
use App\Repositories\Setting\RestaurantTableLocationRepository;
use App\Repositories\Setting\RestaurantLinkTableUserRepository;
// shared
use App\Repositories\Shared\AttachableStructureRepository;

class MainServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        
        //bind interface with the repository
        $this->app->bind(BaseRepositoryInterface::class, BaseRepository::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(RestaurantFoodRepositoryInterface::class, RestaurantFoodRepository::class);
        $this->app->bind(RestaurantOrderRepositoryInterface::class, RestaurantOrderRepository::class);
        $this->app->bind(RestaurantOrderDetailRepositoryInterface::class, RestaurantOrderDetailRepository::class);
        $this->app->bind(RestaurantFoodDetailRepositoryInterface::class, RestaurantFoodDetailRepository::class);
        $this->app->bind(RestaurantTableRepositoryInterface::class, RestaurantTableRepository::class);
        $this->app->bind(TemporaryOrderRepositoryInterface::class, TemporaryOrderRepository::class);

        // setting
        $this->app->bind(RestaurantFoodCategoryRepositoryInterface::class, RestaurantFoodCategoryRepository::class);
        $this->app->bind(RestaurantTableLocationRepositoryInterface::class, RestaurantTableLocationRepository::class);
        $this->app->bind(RestaurantLinkTableUserRepositoryInterface::class, RestaurantLinkTableUserRepository::class);
        
        // shared
        $this->app->bind(AttachableStructureRepositoryInterface::class, AttachableStructureRepository::class);
       
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
