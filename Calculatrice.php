<?php

namespace Shinv\TestUnitaire;

class Calculatrice
{
    public function somme(int $a, int $b) : int
    {
        return $a + $b;
    }

    public function div(int $a, int $b): int
    {
        if ($b === 0) {
            throw new \DivisionByZeroError("Division by zero");
        }
        return $a / $b;
    }

    public function soustraction(int $a, int $b): int
    {
        return $a - $b;
    }

    public function multiplication(int $a, int $b): int
    {
        return $a * $b;
    }
}
