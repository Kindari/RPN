<?php

use PHPUnit\Framework\TestCase;

class RpnHelperTest extends Testcase
{

	public function testAdditionOperator()
	{
		$this->assertEquals(10, rpn('4 6 +'));
		$this->assertEquals(4.4, rpn('3.1 1.3 +'));
	}

	public function testSubtractionoperator()
	{
		$this->assertEquals(-2, rpn('4 6 -'));
		$this->assertEquals(200.3, rpn('600.7 400.4 -'));
	}

	public function testMultiplicationOperator()
	{
		$this->assertEquals(50, rpn('5 10 *'));
		$this->assertEquals(22, rpn('2.2 10 *')); 
	}

	public function testDivisionOperator()
	{
		$this->assertEquals(4, rpn('20 5 /'));
		$this->assertEquals(6, rpn('21 3.5 /'));
	}

	public function testMultipleOperators()
	{
		$this->assertEquals(36, rpn('3 5 7 + *'));
		$this->assertEquals(99.2, rpn('8 5.1 7.3 + *'));
	}

	public function testNotEnoughArgumentsWithSingleOperator()
	{
		$this->expectException(\InvalidArgumentException::class);
		rpn('3 +');
	}
	
	public function testNotEnoughArgumentsWithMultipleOperators()
	{
		$this->expectException(\InvalidArgumentException::class);
		rpn('5 6 + *');
	}

	public function testTooManyArgumentsWithSingleOperator()
	{
		$this->expectException(\RuntimeException::class);
		rpn('1 2 3 +');
	}

	public function testTooManyArgumentsWithMultipleOperators()
	{
		$this->expectException(\RuntimeException::class);
		rpn('1 2 3 4 + *');
	}

}
