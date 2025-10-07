<?php

class Calculator {

    public $operator = "!";
    public $number1 = -1000;
    public $number2 = -1000;
    public $answer = -1000;
    
    public function calc($operator = null, $number1 = null, $number2 = null) {

        if ($operator === null || $number1 === null || $number2 === null) 
        {
            return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
        }
        
        if ($operator == "+") //add
        {

            try
            {
                $answer = $number1 + $number2;

                return "The calculation is " . $number1 . " " . $operator . " " . $number2 . ". The answer is " . $answer . ".<br>";
            }
            catch (throwable $e)
            {
                return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
            }

        }
        elseif ($operator == "-") //subtract
        {

            try
            {
                $answer = $number1 - $number2;

                return "The calculation is " . $number1 . " " . $operator . " " . $number2 . ". The answer is " . $answer . ".<br>";
            }
            catch (throwable $e)
            {
                return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
            }

        }
        elseif ($operator == "*") //multiply
        {

            try
            {
                $answer = $number1 * $number2;

                return "The calculation is " . $number1 . " " . $operator . " " . $number2 . ". The answer is " . $answer . ".<br>";
            }
            catch (throwable $e)
            {
                return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
            }

        }
        elseif ($operator == "/") //divide
        {

            try 
            {
                $answer = $number1 / $number2;

                return "The calculation is " . $number1 . " " . $operator . " " . $number2 . ". The answer is " . $answer . ".<br>";
            }
            catch (DivisionByZeroError $e)
            {
                return "The calculation is " . $number1 . " " . $operator . " " . $number2 . ". The answer is cannot divide a number by zero.<br>";
            }
            catch (throwable $e)
            {
                return "Cannot perform operation. You must have three arguments. A string for the operator (+,-,*,/) and two integers or floats for the numbers.<br>";
            }
           
        }
        else //if operator is not valid
        {
            return "Operator invalid.<br>";
        }

    }

}