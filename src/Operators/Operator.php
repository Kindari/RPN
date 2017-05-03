<?php namespace Kindari\RPN\Operators;

use Kindari\RPN\Token;
use Kindari\RPN\Operands\Operand;

interface Operator extends Token
{

	public function calculate(Operand $first, Operand $second);

}
