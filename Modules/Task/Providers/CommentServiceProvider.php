<?php

namespace Modules\Task\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Task\Contracts\Repositories\CommentRepositoryInterface;
use Modules\Task\Contracts\Services\CommentServiceInterface;
use Modules\Task\Repository\CommentRepository;
use Modules\Task\Services\CommentService;

class CommentServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     */
    public function register(): void {
        $this->app->bind(CommentRepositoryInterface::class, CommentRepository::class);
        $this->app->bind(CommentServiceInterface::class, CommentService::class);
    }

    /**
     * Get the services provided by the provider.
     */
    public function provides(): array
    {
        return [];
    }
}
