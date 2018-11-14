<?php
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 12:41 PM
 */


namespace App\Tests\Services;

use App\Services\Addition;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class AdditionTest
 * @package App\Tests\Services
 */
class AdditionTest extends TestCase
{
    /**
     * @var Addition $additionObject
     */
    public $additionObject;

    /**
     * Initialize class object
     */
    protected function setUp()
    {
        $this->additionObject = new Addition();
    }

    /**
     * Test If addition is correct
     */
    public function testIfAdditionIsCorrect()
    {
        $params = [4,12];
        $response = $this->additionObject->calculate($params);
        $this->assertEquals(16, $response);
    }
}