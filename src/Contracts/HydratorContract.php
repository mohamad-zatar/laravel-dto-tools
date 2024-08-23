<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Contracts;

interface HydratorContract
{
    /**
     * Fill a data object with properties.
     *
     * @param  class-string<DataObjectContract>  $class  The class name of the data object to be filled.
     * @param  array<string, mixed>  $properties  An associative array of properties to populate the data object with.
     * @return DataObjectContract The populated data object.
     */
    public function fill(string $class, array $properties): DataObjectContract;
}
