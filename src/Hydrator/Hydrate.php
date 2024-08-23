<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Hydrator;

use EventSauce\ObjectHydrator\ObjectMapperUsingReflection;
use MohamadZatar\DataObjects\Contracts\DataObjectContract;
use MohamadZatar\DataObjects\Contracts\HydratorContract;

class Hydrate implements HydratorContract
{
    private readonly ObjectMapperUsingReflection $mapper;

    /**
     * Constructor.
     *
     * @param  ObjectMapperUsingReflection|null  $mapper  Optional custom object mapper.
     */
    public function __construct(?ObjectMapperUsingReflection $mapper = null)
    {
        $this->mapper = $mapper ?? new ObjectMapperUsingReflection();
    }

    /**
     * Fill the data object with properties.
     *
     * @param  class-string<DataObjectContract>  $class  The class name of the data object to be filled.
     * @param  array<string, mixed>  $properties  An associative array of properties to populate the data object with.
     * @return DataObjectContract The populated data object.
     */
    public function fill(string $class, array $properties): DataObjectContract
    {
        return $this->mapper->hydrateObject(
            className: $class,
            payload: $properties
        );
    }
}
