<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\Common\Collections\ArrayCollection;

final class PrecheckFilterMatcher implements FilterMatcher
{
    private readonly array $appliers;
    private readonly EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager, FilterApplier ...$appliers)
    {
        $this->appliers = $appliers;
        $this->entityManager = $entityManager;
    }

    /**
     * @return ArrayCollection<PreCheck>
     */
    public function match(Pagination $pagination, Filter ...$filters): ArrayCollection
    {
        $builder = $this
            ->entityManager
            ->createQueryBuilder()
            ->select('preCheck')
            ->from(PreCheck::class, 'preCheck')
        ;

        foreach ($filters as $filter) {
            foreach ($this->appliers as $applier) {
                if ($applier->supports($filter->getType())) {
                    $applier->apply($builder, $filter);
                }
            }
        }

        // todo pagination apply

        return $builder->getQuery()->getResult();
    }
}
