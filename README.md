# RPN
An exploration in implementing an Reverse Polish Notation Calculator

# Environment

```
[root@php7 rpn]# php --version
PHP 7.1.1 (cli) (built: Jan 19 2017 20:35:16) ( NTS )
Copyright (c) 1997-2017 The PHP Group
Zend Engine v3.1.0, Copyright (c) 1998-2017 Zend Technologies
    with Zend OPcache v7.1.1, Copyright (c) 1999-2017, by Zend Technologies
    
[root@php7 rpn]# vendor/bin/phpunit --debug
PHPUnit 6.1.3 by Sebastian Bergmann and contributors.


Starting test 'RPNTest::testAdditionOperator'.
.
Starting test 'RPNTest::testSubtractionoperator'.
.
Starting test 'RPNTest::testMultiplicationOperator'.
.
Starting test 'RPNTest::testDivisionOperator'.
.
Starting test 'RPNTest::testMultipleOperators'.
.
Starting test 'RPNTest::testNotEnoughArgumentsWithSingleOperator'.
.
Starting test 'RPNTest::testNotEnoughArgumentsWithMultipleOperators'.
.
Starting test 'RPNTest::testTooManyArgumentsWithSingleOperator'.
.
Starting test 'RPNTest::testTooManyArgumentsWithMultipleOperators'.
.
Starting test 'RPNTest::testTokenNotFound'.
.
Starting test 'RpnHelperTest::testAdditionOperator'.
.
Starting test 'RpnHelperTest::testSubtractionoperator'.
.
Starting test 'RpnHelperTest::testMultiplicationOperator'.
.
Starting test 'RpnHelperTest::testDivisionOperator'.
.
Starting test 'RpnHelperTest::testMultipleOperators'.
.
Starting test 'RpnHelperTest::testNotEnoughArgumentsWithSingleOperator'.
.
Starting test 'RpnHelperTest::testNotEnoughArgumentsWithMultipleOperators'.
.
Starting test 'RpnHelperTest::testTooManyArgumentsWithSingleOperator'.
.
Starting test 'RpnHelperTest::testTooManyArgumentsWithMultipleOperators'.
.                                               19 / 19 (100%)

Time: 35 ms, Memory: 4.00MB

OK (19 tests, 29 assertions)
```
