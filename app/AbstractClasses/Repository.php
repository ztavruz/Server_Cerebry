<?php
declare(strict_types=1);

namespace App\AbstractClasses;

interface Repository{
    public function getAll(): array;

}