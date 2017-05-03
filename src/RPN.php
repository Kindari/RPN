<?php namespace Kindari\RPN;

use Kindari\RPN\Operands\IntegerOperand;
use Kindari\RPN\Operands\FloatOperand;

use Kindari\RPN\Operators\AdditionOperator;
use Kindari\RPN\Operators\SubtractionOperator;
use Kindari\RPN\Operators\MultiplicationOperator;
use Kindari\RPN\Operators\DivisionOperator;

class RPN
{

	protected $lexer;

	protected $tokens = [
		IntegerOperand::class,
		FloatOperand::class,
		AdditionOperator::class,
		SubtractionOperator::class,
		MultiplicationOperator::class,
		DivisionOperator::class
	];


	/**
	* Register all of the tokens for RPN with our Lexer.
	* 
	* If I were to continue working on this project I would like to implement additional operands
	* and operators, as well as a memory system for storing variables. I'd also want to expose some
	* mathematical constants such as pi and e.
	*/
	public function __construct()
	{
		$this->lexer = new Lexer;
	
		foreach($this->tokens as $token)
		{
			$this->lexer->registerToken($token);
		}
	}

	/**
	* @param str $input An RPN statement to calculate
	* @return int|float
	*/
	public function calculate($input)
	{
		return $this->lexer->evaluate($input)->getValue();
	}

}
