<?php

declare(strict_types=1);

namespace App\Entities;

class Position
{
    public int $horizontal;
    public int $vertical;

    public function __construct(int $horizontal, int $vertical)
    {
        $this->horizontal = $horizontal;
        $this->vertical = $vertical;
    }
}
