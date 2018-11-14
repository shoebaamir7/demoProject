<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 1:48 PM
 */

namespace App\Tests\Services;

use App\Services\Multiplication;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class MultiplicationTest
 * @package App\Tests\Services
 */
class MultiplicationTest extends TestCase
{
    /**
     * @var Multiplication $multiplicationObject
     */
    public $multiplicationObject;

    /**
     * Initialize class object
     */
    protected function setUp()
    {
        $this->multiplicationObject = new Multiplication();
    }

    /**
     * Test If Multiplication is correct
     */
    public function testIfMultiplicationsIsCorrect()
    {
        $params = [12,4];
        $response = $this->multiplicationObject->calculate($params);
        $this->assertEquals(48, $response);
    }
}