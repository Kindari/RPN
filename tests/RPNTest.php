<?php

use PHPUnit\Framework\TestCase;
use Kindari\RPN\RPN;
use Kindari\RPN\Exceptions\TokenNotFoundException;
use Kindari\RPN\Exceptions\NotEnoughOperandsException;
use Kindari\RPN\Exceptions\TooManyOperandsException;

class RPNTest extends Testcase
{

	public function setUp()
	{
		$this->rpn = new RPN;
	}

	public function testAdditionOperator()
	{
		$this->assertEquals(10, $this->rpn->calculate('4 6 +'));
		$this->assertEquals(4.4, $this->rpn->calculate('3.1 1.3 +'));
	}

	public function testSubtractionoperator()
	{
		$this->assertEquals(-2, $this->rpn->calculate('4 6 -'));
		$this->assertEquals(200.3, $this->rpn->calculate('600.7 400.4 -'));
	}

	public function testMultiplicationOperator()
	{
		$this->assertEquals(50, $this->rpn->calculate('5 10 *'));
		$this->assertEquals(22, $this->rpn->calculate('2.2 10 *')); 
	}

	public function testDivisionOperator()
	{
		$this->assertEquals(4, $this->rpn->calculate('20 5 /'));
		$this->assertEquals(6, $this->rpn->calculate('21 3.5 /'));
	}

	public function testMultipleOperators()
	{
		$this->assertEquals(36, $this->rpn->calculate('3 5 7 + *'));
		$this->assertEquals(99.2, $this->rpn->calculate('8 5.1 7.3 + *'));
	}

	public function testNotEnoughArgumentsWithSingleOperator()
	{
		$this->expectException(NotEnoughOperandsException::class);
		$this->rpn->calculate('3 +');
	}
	
	public function testNotEnoughArgumentsWithMultipleOperators()
	{
		$this->expectException(NotEnoughOperandsException::class);
		$this->rpn->calculate('5 6 + *');
	}

	public function testTooManyArgumentsWithSingleOperator()
	{
		$this->expectException(TooManyOperandsException::class);
		$this->rpn->calculate('1 2 3 +');
	}

	public function testTooManyArgumentsWithMultipleOperators()
	{
		$this->expectException(TooManyOperandsException::class);
		$this->rpn->calculate('1 2 3 4 + *');
	}

	public function testTokenNotFound()
	{
		$this->expectException(TokenNotFoundException::class);
		$this->rpn->calculate('1 2 3 foo + -');
	}

}
