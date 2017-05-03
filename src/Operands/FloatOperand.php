<?php namespace Kindari\RPN\Operands;

class FloatOperand implements Operand
{
	public static function getPattern()
	{
		return '/^(\d+\.\d+)$/';
	}

	public function __construct($value)
	{
		$this->_value = floatval($value);
	}

	public function getValue()
	{
		return $this->_value;
	}

	
}
