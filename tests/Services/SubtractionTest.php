<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 12:59 PM
 */

namespace App\Tests\Services;

use App\Services\Subtraction;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class SubtractionTest
 * @package App\Tests\Services
 */
class SubtractionTest extends TestCase
{
    /**
     * @var Subtraction $subtractionObject
     */
    public $subtractionObject;

    /**
     * Initialize class object
     */
    protected function setUp()
    {
        $this->subtractionObject = new Subtraction();
    }

    /**
     * Test If Subtraction is correct
     */
    public function testIfSubtractionIsCorrect()
    {
        $params = [12,4];
        $response = $this->subtractionObject->calculate($params);
        $this->assertEquals(8, $response);
    }
}