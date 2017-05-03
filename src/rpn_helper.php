<?php

function rpn($input) {
	$tokens = explode(' ',$input);
	#var_dump($tokens);
	$stack = [];
	
	foreach ($tokens as $token) {
		#echo "Begin processing token \"{$token}\"" . PHP_EOL . "Stack: ";
		#var_dump($stack);

		if (preg_match('/^\d+$/', $token)) {
			// its an integer, add it to the stack
			$stack[] = intval($token);
		}
		elseif (preg_match('/^\d+\.\d+$/', $token)) {
			// it's a float, add it to the stack
			$stack[] = floatval($token);
		}
		elseif (in_array($token, ['+', '-', '*', '/'])) {
			// it's an operator, process values, add result to stack
			$z = array_pop($stack);
			$y = array_pop($stack);

			if (is_null($z) || is_null($y))
			{
				throw new \InvalidArgumentException("Not enough Arguments for Operator");
			}

			switch($token) {
				case '+':
					$result = $y + $z;
					break;
				case '-':
					$result = $y - $z;
					break;
				case '*':
					$result = $y * $z;
					break;
				case '/':
					$result = $y / $z;
					break;
				default:
					throw \LogicException("How did you even get here? http://i.imgur.com/tJyV0XS.jpg");
			}
			$stack[] = $result;

		}
		#echo "After processing token \"{$token}\"" . PHP_EOL . "Stack: ";
		#var_dump($stack);
	}

	if ( count($stack) != 1 ) {
		throw new RuntimeException("Invalid input, stack has too many items");
	}

	return array_pop($stack);

}
