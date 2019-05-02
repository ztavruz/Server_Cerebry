<?php
declare(strict_types=1);

namespace App\AbstractClasses;

interface Service{
    
    public function list(): array;
    public function create();

}
