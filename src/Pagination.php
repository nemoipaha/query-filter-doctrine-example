<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

class Pagination
{
    public function __construct(public readonly int $limit = 100, public readonly int $offset = 0)
    {
    }
}
