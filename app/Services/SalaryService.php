<?php

namespace App\Services;

use App\DTO\Salary;
use App\Models\TaxBand;

class SalaryService
{
    public function calculate(float $grossAnnualSalary): Salary
    {
        $taxBands = TaxBand::orderBy('annual_salary_range_min')->get();

        $annualTaxPaid = 0;
        $remainingSalary = $grossAnnualSalary;

        foreach ($taxBands as $band) {
            if ($remainingSalary < $band->annual_salary_range_min) {
                continue;
            }

            $rangeMax = $band->annual_salary_range_max ?? $grossAnnualSalary;
            $taxableAmount = min($remainingSalary, $rangeMax - $band->annual_salary_range_min);
            $annualTaxPaid += ($taxableAmount * $band->rate) / 100;
            $remainingSalary -= $taxableAmount;
        }

        return new Salary($grossAnnualSalary, $annualTaxPaid);
    }
}
