<?php namespace Kindari\RPN\Operands;

use Kindari\RPN\Token;

interface Operand extends Token
{
	// We will pass the matched value to the constructor of each operand
	public function __construct($value);

	// Give each operand a getter for type casting and other operations
	public function getValue();
}
