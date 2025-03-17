<?php

namespace ShinV\TestUnitaire\Tests;

use ShinV\TestUnitaire\Employer;
use PHPUnit\Framework\TestCase;

class EmployerTest extends TestCase
{
    public function testGetName()
    {
        $employer = new Employer("Pierre Dupont", 50000);
        $this->assertEquals("Pierre Dupont", $employer->getName());
    }

    public function testSetName()
    {
        $employer = new Employer("Pierre Dupont", 50000);
        $employer->setName("Marine Richard");
        $this->assertEquals("Marine Richard", $employer->getName());
    }

    public function testGetSalaire()
    {
        $employer = new Employer("Pierre Dupont", 50000);
        $this->assertEquals(50000, $employer->getSalaire());
    }

    public function testSetSalaire()
    {
        $employer = new Employer("Pierre Dupont", 50000);
        $employer->setSalaire(60000);
        $this->assertEquals(60000, $employer->getSalaire());
    }
}
