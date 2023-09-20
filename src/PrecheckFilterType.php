<?php

declare(strict_types=1);

namespace Nemoi\FiltersExample;

enum PrecheckFilterType: string implements FilterType
{
    case COMPANY_NAME = 'c';
    case STATUS = 's';
}
