<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

use Doctrine\ORM\QueryBuilder;

interface FilterApplier
{
    public function apply(QueryBuilder $queryBuilder, Filter $filter): void;

    public function supports(FilterType $type): bool;
}
