<?php
/**
 * Created by IntelliJ IDEA.
 * User: czoeller
 * Date: 23.03.16
 * Time: 16:11
 */

namespace HsBremen\WebApi\Tests;


use HsBremen\WebApi\Calculator;
use PHPUnit_Framework_TestCase;
use HsBremen\WebApi\DivisionByZeroException;

class CalculatorTest extends PHPUnit_Framework_TestCase
{

    private $calculator;

    protected function setUp()
    {
        $this->calculator = new Calculator();
    }

    protected function tearDown()
    {
        $this->calculator = null;
    }

    public function test_2plus2()
    {
        // Arrange
        // Act
        $result = $this->calculator->add(2, 2);
        // Assert
        $this->assertEquals(4, $result);
    }

    public function test_2plus3()
    {
        // Arrange
        // Act
        $result = $this->calculator->add(2, 3);
        // Assert
        $this->assertEquals(5, $result);
    }

    public function test_2minus2()
    {
        // Arrange
        // Act
        $result = $this->calculator->substract(2, 2);
        // Assert
        $this->assertEquals(0, $result);
    }

    /**
     * @expectedException \HsBremen\WebApi\DivisionByZeroException
     */
    public function testDivisionByZeroAnnoation() {
        $result = $this->calculator->divide(2, 0);
    }

}

