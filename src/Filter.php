<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

interface Filter
{
    public function getType(): FilterType;

    public function getValue(): mixed;
}
