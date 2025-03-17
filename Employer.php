<?php

namespace ShinV\TestUnitaire;

class Employer
{
    private string $name;
    private int $salaire;

    public function __construct(string $name, int $salaire)
    {
        $this->name = $name;
        $this->salaire = $salaire;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getSalaire(): int
    {
        return $this->salaire;
    }

    public function setSalaire(int $salaire): void
    {
        $this->salaire = $salaire;
    }
}
