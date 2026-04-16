<?php
use PHPUnit\Framework\TestCase;
require_once __DIR__ . '/../src/Calculadora.php';
class CalculadoraTest extends TestCase
{
    private $calculadora;

    protected function setUp(): void
    {
        $this->calculadora = new Calculadora();
    }

    public function testSumar()
    {
        $resultado = $this->calculadora->sumar(2, 3);
        $this->assertEquals(5, $resultado);
    }

    public function testRestar()
    {
        $resultado = $this->calculadora->restar(5, 3);
        $this->assertEquals(2, $resultado);
    }

    public function testMultiplicar()
    {
        $resultado = $this->calculadora->multiplicar(2, 3);
        $this->assertEquals(6, $resultado);
    }

    public function testDividir()
    {
        $resultado = $this->calculadora->dividir(6, 3);
        $this->assertEquals(2, $resultado);
    }

    public function testDividirPorCero()
    {
        $this->expectException(InvalidArgumentException::class);
        $this->calculadora->dividir(6, 0);
    }
}