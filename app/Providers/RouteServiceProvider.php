<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $namespace = 'App\Http\Controllers';

    public function boot()
    {
        //

        parent::boot();
    }

    public function map()
    {
        $this->mapAuthApiRoutes();

        $this->mapSharedApiRoutes();

        $this->mapClientRoomRoutes();

        $this->mapClientHotelRoutes();

        $this->mapClientTourRoutes();

        $this->mapClientWebRoutes();

        $this->mapCommonWebRoutes();

        $this->mapAdminSystemRoutes();

        $this->mapAdminHotelRoutes();

        $this->mapAdminTourRoutes();

        $this->mapAdminSettingRoutes();

        $this->mapAdminWebRoutes();

        //
    }

    protected function mapClientRoomRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Client/room.php'));
    }

    protected function mapClientHotelRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Client/hotel.php'));
    }

    protected function mapClientTourRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Client/tour.php'));
    }

    protected function mapClientWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Client/web.php'));
    }

    protected function mapCommonWebRoutes()
    {
        Route::prefix('common')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Common/web.php'));
    }

    protected function mapAuthApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/Api/Auth/api.php'));
    }

    protected function mapSharedApiRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Api/Shared/api.php'));
    }

    protected function mapAdminWebRoutes()
    {
        Route::prefix('adminpanel')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/web.php'));
    }

    protected function mapAdminSystemRoutes()
    {
        Route::prefix('adminpanel')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/system.php'));
    }

    protected function mapAdminHotelRoutes()
    {
        Route::prefix('adminpanel')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/hotel.php'));
    }

    protected function mapAdminTourRoutes()
    {
        Route::prefix('adminpanel')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/tour.php'));
    }

    protected function mapAdminSettingRoutes()
    {
        Route::prefix('adminpanel')
            ->middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/Admin/settings.php'));
    }


}
