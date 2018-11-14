<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 5:44 PM
 */

namespace App\Services;

use App\Interfaces\calculator;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class Subtraction
 * @package App\Services
 */
class Subtraction implements calculator
{
    /**
     * @param array $params
     * @return string
     * @throws Exception
     */
    public function calculate(array $params)
    {
        $this->validateRequestData($params);
        $result = $params[0] - $params[1];

        return $result;
    }

    /**
     * @param array $params
     * @throws Exception
     */
    public function validateRequestData(array $params)
    {
        if(empty($params)) {
            throw new Exception('Please enter operands', Response::HTTP_BAD_REQUEST);
        }

        if(count($params) > 2) {
            throw new Exception('Only 2 operands allowed', Response::HTTP_BAD_REQUEST);
        }

        foreach ($params as $number) {
            if(!is_numeric($number)) {
                throw new Exception('Only numeric values allowed', Response::HTTP_BAD_REQUEST);
            }

            if($number > 100000) {
                throw new Exception('Operand value should be less than 100000', Response::HTTP_BAD_REQUEST);
            }
        }
    }
}