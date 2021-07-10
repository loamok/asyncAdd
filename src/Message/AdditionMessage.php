<?php

namespace App\Message;

use App\Entity\Addition;
use Doctrine\ORM\EntityManagerInterface;

final class AdditionMessage {
    
    private $a;
    private $b;

    public function __construct(int $a, int $b) {
        $this->a = $a;
        $this->b = $b;
    }

    public function getA(): int {
        return $this->a;
    }
    
    public function getB(): int {
        return $this->b;
    }
}
