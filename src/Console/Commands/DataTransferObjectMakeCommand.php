<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Console\Commands;

use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;

final class DataTransferObjectMakeCommand extends GeneratorCommand
{
    protected $signature = 'make:dto {name : The DTO Name}';

    protected $description = 'Create a new DTO';

    protected $type = 'Data Transfer Object';

    /**
     * Get the path to the stub file based on PHP version.
     *
     * @return string
     */
    protected function getStub(): string
    {
        $phpVersion = PHP_VERSION;
        $isReadonlySupported = Str::contains($phpVersion, ['8.2', '8.3']);

        $stubFile = $isReadonlySupported ? 'dto-82.stub' : 'dto.stub';

        return __DIR__ . "/../../../stubs/{$stubFile}";
    }

    /**
     * Get the default namespace for the DTO class.
     *
     * @param string $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace): string
    {
        return "{$rootNamespace}\\DataObjects";
    }
}
