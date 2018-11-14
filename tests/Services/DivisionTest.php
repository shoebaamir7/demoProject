<?php
declare(strict_types=1);
/**
 * Created by PhpStorm.
 * User: AAMIR
 * Date: 11/11/2018
 * Time: 2:31 PM
 */

namespace App\Tests\Services;

use App\Services\Division;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

/**
 * Class DivisionTest
 * @package App\Tests\Services
 */
class DivisionTest extends TestCase
{
    /**
     * @var Division $divisionObject
     */
    public $divisionObject;

    /**
     * Initialize class object
     */
    protected function setUp()
    {
        $this->divisionObject = new Division();
    }

    /**
     * Test If Division is correct
     */
    public function testIfMultiplicationsIsCorrect()
    {
        $params = [12,4];
        $response = $this->divisionObject->calculate($params);
        $this->assertEquals(3, $response);
    }
}