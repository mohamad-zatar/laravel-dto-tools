<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Providers;

use Illuminate\Support\ServiceProvider;
use MohamadZatar\DataObjects\Console\Commands\DataTransferObjectMakeCommand;
use MohamadZatar\DataObjects\Contracts\HydratorContract;
use MohamadZatar\DataObjects\Hydrator\Hydrate;

final class PackageServiceProvider extends ServiceProvider
{
    /**
     * @var array<class-string,class-string>
     */
    public array $bindings = [
        HydratorContract::class => Hydrate::class,
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->commands(
                commands: [
                    DataTransferObjectMakeCommand::class,
                ],
            );
        }
    }
}
