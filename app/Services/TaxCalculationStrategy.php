<?php

namespace App\Services;

use App\DTO\SalaryDto;

interface TaxCalculationStrategy
{
    public function calculate(float $grossAnnualSalary): SalaryDto;
}
