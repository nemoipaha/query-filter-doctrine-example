<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

use Doctrine\Common\Collections\ArrayCollection;

interface FilterMatcher
{
    public function match(Pagination $pagination, Filter ...$filters): ArrayCollection;
}
