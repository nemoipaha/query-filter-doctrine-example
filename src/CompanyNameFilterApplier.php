<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

use Doctrine\ORM\QueryBuilder;

final class CompanyNameFilterApplier implements FilterApplier
{
    public function apply(QueryBuilder $queryBuilder, Filter $filter): void
    {
        // todo refactor aliases
        $queryBuilder->andWhere($queryBuilder->expr()->like('companyName', $filter->value));
    }

    public function supports(FilterType $type): bool
    {
        return $type === PrecheckFilterType::COMPANY_NAME;
    }
}
