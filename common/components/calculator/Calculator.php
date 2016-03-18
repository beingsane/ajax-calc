<?php

namespace common\components\calculator;

/**
 * Calculator of simple arithmetical expression
 */
class Calculator
{
    /**
     * Calculates arithmetical expression
     * @param string $expression Expression to be calculated
     * @return float|integer|false Returns integer or float value for valid expression, false if expression is invalid
     */
    public function calculate($expression)
    {
        $parsedExpression = $this->parse($expression);
        return $this->getResult($parsedExpression);
    }

    /**
     * Parses arithmetical expression
     * @param string $expression Expression to be parsed
     * @return array|false Parsing result
     */
    protected function parse($expression)
    {
        $matches = [];
        if (preg_match_all('/^(\d+)([\+\-\*\/])(\d+)$/', $expression, $matches)) {
            $parsedExpression = [
                'firstNumber' => $matches[1][0],
                'sign' => $matches[2][0],
                'secondNumber' => $matches[3][0],
            ];

            return $parsedExpression;
        } else {
            throw new CalculatorException('Неправильный формат выражения');
        }
    }

    /**
     * Calculates result of arithmetical expression
     * @param array $parsedExpression Expression to be calculated
     * @return int|float Expression result
     */
    protected function getResult($parsedExpression)
    {
        $result = 0;

        switch ($parsedExpression['sign']) {
            case '+':
                $result = $parsedExpression['firstNumber'] + $parsedExpression['secondNumber'];
            break;

            case '-':
                $result = $parsedExpression['firstNumber'] - $parsedExpression['secondNumber'];
            break;

            case '*':
                $result = $parsedExpression['firstNumber'] * $parsedExpression['secondNumber'];
            break;

            case '/':
                if ($parsedExpression['secondNumber'] == 0) {
                    throw new CalculatorException('Деление на ноль');
                }

                $result = $parsedExpression['firstNumber'] / $parsedExpression['secondNumber'];
            break;

            default:
                $result = 0;
            break;
        }

        return $result;
    }
}
