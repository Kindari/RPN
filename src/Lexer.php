<?php namespace Kindari\RPN;

use Kindari\RPN\Operands\Operand;
use Kindari\RPN\Operators\Operator;

use Kindari\RPN\Exceptions\TokenNotFoundException;
use Kindari\RPN\Exceptions\TooManyOperandsException;
use Kindari\RPN\Exceptions\NotEnoughOperandsException;

class Lexer
{

	protected $tokens = [];

	/**
	* Register a token that the lexer can parse strings with.
	*
	* @param string $token_class The fully qualified class name of the token to register
	*/
	public function registerToken($token_class)
	{
		$this->tokens[$token_class] = $token_class::getPattern();
	}

	/**
	* @param string $token The string to match against a token's Pattern
	* @return Kindari\RPN\Token
	*/
	public function findToken($token)
	{
		foreach($this->tokens as $token_class => $pattern )
		{
			if ( preg_match( $pattern, $token ) )
			{
				return new $token_class ( $token );
			}
		}

		throw new TokenNotFoundException("A Token matching \"{$token}\" was not found");
	}


	/**
	* Break an input string into an array of tokens
	* @param string $input The string to process
	* @return array The stack of tokens to later evaluate
	*/
	protected function parse($input)
	{
		$parts = explode(' ', $input);
		$stack = [];

		foreach($parts as $part)
		{
			$stack[] = $this->findToken( $part );
		}

		return $stack;
	}


	/**
	* Evaluate an input string (expression)
	* @param string $input The expression to parse
	* @return Kindari\RPN\Operand A resulting operand from the expression
	*/
	public function evaluate($input)
	{

		$tokens = $this->parse($input);
		$stack = [];

		foreach($tokens as $token)
		{
			if ($token instanceof Operand)
			{
				$stack[] = $token;
			}
			elseif($token instanceof Operator)
			{
				// @todo Extend this to determine number of operands to pass by asking the operator
				if ( count($stack) < 2 )
				{
					throw new NotEnoughOperandsException("Not enough operands in stack");
				}

				// When passing the operands for processing we need to ensure we do so in the right order.
				// This matters for some operators, such as division.
				$second_operand = array_pop( $stack );
				$first_operand = array_pop( $stack );

				$stack[] = $token->calculate($first_operand, $second_operand);
			}
		}

		if( count( $stack ) > 1 )
		{
			throw new TooManyOperandsException("Too many operands in stack");
		}

		return array_pop( $stack );

	}


}
