<?php namespace Kindari\RPN\Operands;

class IntegerOperand implements Operand
{
	public static function getPattern()
	{
		return '/^(\d+)$/';
	}

	public function __construct($value)
	{
		$this->_value = intval($value);
	}

	public function getValue()
	{
		return $this->_value;
	}

	
}
