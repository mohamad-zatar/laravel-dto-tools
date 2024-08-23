<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Facades;

use Illuminate\Support\Facades\Facade;
use MohamadZatar\DataObjects\Contracts\DataObjectContract;
use MohamadZatar\DataObjects\Hydrator\Hydrate;

/**
 * Facade for the Hydrate service.
 *
 * @method static DataObjectContract fill(string $class, array $properties)
 *
 * @see \MohamadZatar\DataObjects\Hydrator\Hydrate
 */
final class Hydrator extends Facade
{
    /**
     * Get the service container binding for the facade.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Hydrate::class;
    }
}
