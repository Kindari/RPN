<?php namespace Kindari\RPN\Operators;

use Kindari\RPN\Operands\Operand;
use Kindari\RPN\Operands\IntegerOperand;
use Kindari\RPN\Operands\FloatOperand;

class DivisionOperator implements Operator
{
	public static function getPattern()
	{
		return '/^(\/)$/';
	}

	public function calculate(Operand $first, Operand $second)
	{
		$result = $first->getValue() / $second->getValue();

		if ( is_float( $result ) )
			return new FloatOperand( $result );
		return new IntegerOperand( $result );
	}
}
