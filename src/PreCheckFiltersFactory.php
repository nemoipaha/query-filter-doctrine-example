<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

use RuntimeException;
use Doctrine\Common\Collections\ArrayCollection;

class PreCheckFiltersFactory
{
    /**
     * @return ArrayCollection<PrecheckFilter>
     */
    public function createFromArray(array $filters): ArrayCollection
    {
        $coll = new ArrayCollection();

        foreach ($filters as $key => $val) {
            $type = match ($key) {
                'c' => PrecheckFilterType::COMPANY_NAME,
                's' => PrecheckFilterType::STATUS,
                default => throw new RuntimeException(),
            };

            $coll->add(new PrecheckFilter($type, $val));
        }

        return $coll;
    }
}
