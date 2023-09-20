<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

class PrecheckFilter implements Filter
{
    public function __construct(
        public readonly PrecheckFilterType $type,
        public readonly mixed $value,
    ) {
    }

    public function getType(): FilterType
    {
        return $this->type;
    }

    public function getValue(): mixed
    {
        return $this->value;
    }
}
