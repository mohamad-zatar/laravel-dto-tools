<?php

declare(strict_types=1);

namespace MohamadZatar\DataObjects\Contracts;

interface DataObjectContract
{
    /**
     * Convert the data object to an associative array.
     *
     * @return array<string, mixed>
     */
    public function toArray(): array;
}
