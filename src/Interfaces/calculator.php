<?php
declare(strict_types=1);
namespace App\Interfaces;

/**
 * Interface calculator
 * @package App\Interfaces
 */
interface calculator
{
    public function calculate(array $params);
    public function validateRequestData(array $params);
}