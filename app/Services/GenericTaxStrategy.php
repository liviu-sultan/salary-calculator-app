<?php

namespace App\Services;

use App\DTO\SalaryDto;
use App\Models\TaxBand;

class GenericTaxStrategy implements TaxCalculationStrategy
{
    public function calculate(float $grossAnnualSalary): SalaryDto
    {
        $salaryDto = new SalaryDto();
        $grossMonthlySalary = $grossAnnualSalary / 12;

        // Retrieve all tax bands in ascending order of range minimum
        $taxBands = TaxBand::orderBy('annual_salary_range_min')->get();

        $annualTaxPaid = 0;
        $remainingSalary = $grossAnnualSalary;

        foreach ($taxBands as $band) {
            // Determine the salary portion within the current band's range
            $rangeMin = $band->annual_salary_range_min;
            $rangeMax = $band->annual_salary_range_max ?? $grossAnnualSalary; // Use gross salary if there's no upper limit

            // Calculate the taxable amount within this band's range
            $taxableAmount = min($remainingSalary, $rangeMax - $rangeMin);

            if ($taxableAmount > 0) {
                // Calculate tax for this band's portion
                $taxForBand = ($taxableAmount * $band->rate) / 100;
                $annualTaxPaid += $taxForBand;

                // Reduce the remaining salary by the taxable amount for this band
                $remainingSalary -= $taxableAmount;
            }

            // Stop if no remaining salary to tax
            if ($remainingSalary <= 0) {
                break;
            }
        }

        $netAnnualSalary = $grossAnnualSalary - $annualTaxPaid;
        $netMonthlySalary = $netAnnualSalary / 12;
        $monthlyTaxPaid = $annualTaxPaid / 12;

        $salaryDto->setGrossAnnualSalary($grossAnnualSalary)
            ->setGrossMonthlySalary($grossMonthlySalary)
            ->setAnnualTaxPaid($annualTaxPaid)
            ->setMonthlyTaxPaid($monthlyTaxPaid)
            ->setNetAnnualSalary($netAnnualSalary)
            ->setNetMonthlySalary($netMonthlySalary);

        return $salaryDto;
    }
}
