<?php

namespace Shinv\TestUnitaire\Tests;

use Shinv\TestUnitaire\Calculatrice;
use PHPUnit\Framework\TestCase;

class CalculatriceTest extends TestCase
{
    public function testSomme()
    {
        $calculatrice = new Calculatrice();
        $this->assertEquals(4, $calculatrice->somme(2, 2));
        $this->assertEquals(10, $calculatrice->somme(9, 1));
    }

    public function testSoustraction()
    {
        $calculatrice = new Calculatrice();
        $this->assertEquals(1, $calculatrice->soustraction(2, 1));
        $this->assertEquals(5, $calculatrice->soustraction(10, 5));
    }

    public function testMultiplication()
    {
        $calculatrice = new Calculatrice();
        $this->assertEquals(4, $calculatrice->multiplication(2, 2));
        $this->assertEquals(20, $calculatrice->multiplication(4, 5));
    }

    public function testDivision()
    {
        $calculatrice = new Calculatrice();
        $this->assertEquals(2, $calculatrice->div(4, 2));
        $this->assertEquals(5, $calculatrice->div(10, 2));
    }

    public function testDivisionParZero()
    {
        $calculatrice = new Calculatrice();
        $this->expectException(\DivisionByZeroError::class);
        $calculatrice->div(4, 0);
    }
}
