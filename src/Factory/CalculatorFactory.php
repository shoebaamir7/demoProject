<?php
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 5:39 PM
 */

namespace App\Factory;

use App\Services\Addition;
use App\Services\Division;
use App\Services\Multiplication;
use App\Services\Subtraction;
use Exception;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class CalculatorFactory
 * @package App\Factory
 */
class CalculatorFactory
{
    /**
     * @var Addition $addition
     */
    private $addition;

    /**
     * @var Subtraction $subtraction
     */
    private $subtraction;

    /**
     * @var Multiplication $multiplication
     */
    private $multiplication;

    /**
     * @var Division $division
     */
    private $division;

    /**
     * CalculatorFactory constructor.
     * @param Addition $addition
     * @param Subtraction $subtraction
     * @param Multiplication $multiplication
     * @param Division $division
     */
    public function __construct(Addition $addition, Subtraction $subtraction, Multiplication $multiplication, Division $division)
    {
        $this->addition = $addition;
        $this->subtraction = $subtraction;
        $this->multiplication = $multiplication;
        $this->division = $division;
    }

    /**
     * @param string $operation
     * @return Addition|Division|Multiplication|Subtraction
     * @throws Exception
     */
    public function getServiceObject(string $operation)
    {
        switch (strtolower($operation)) {
            case 'addition' :
                $object = $this->addition;
                break;

            case 'subtraction' :
                $object = $this->subtraction;
                break;

            case 'multiplication' :
                $object = $this->multiplication;
                break;

            case 'division' :
                $object = $this->division;
                break;

            default:
                throw new Exception(
                    'Invalid operation : Allowed operations are addition,subtraction,multiplication,division',
                    Response::HTTP_BAD_REQUEST
                    );
        }

        return $object;
    }
}