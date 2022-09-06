<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/admin';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapPostsRoutes();

        $this->mapHeadingsRoutes();

        $this->mapArticlesRoutes();

        $this->mapWorksRoutes();

        $this->mapStoriesRoutes();

        $this->mapCategoriesRoutes();

        $this->mapMetasRoutes();

        $this->mapUsersRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api/api.php'));
    }

    protected function mapPostsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin', 'editor'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/posts.php'));
    }

    protected function mapHeadingsRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin', 'editor'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/headings.php'));
    }

    protected function mapArticlesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin', 'editor'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/articles.php'));
    }

    protected function mapWorksRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin', 'editor'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/works.php'));
    }

    protected function mapStoriesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin', 'editor'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/stories.php'));
    }

    protected function mapCategoriesRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/categories.php'));
    }

    protected function mapMetasRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web','auth','admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/metas.php'));
    }

    protected function mapUsersRoutes()
    {
        Route::prefix('admin')
            ->middleware(['web', 'auth', 'admin'])
            ->namespace($this->namespace)
            ->group(base_path('routes/web/users.php'));
    }
}
