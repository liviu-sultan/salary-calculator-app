<?php

namespace App\Services;

use App\DTO\SalaryDto;
use Exception;

class TaxBandBuilderService
{
    public array $bands = [
        'bandA' => ['range' => [0, 5000], 'taxRate' => 0],
        'bandB' => ['range' => [5000, 20000], 'taxRate' => 20],
        'bandC' => ['range' => [20000], 'taxRate' => 40]
    ];

    private function getTaxBandRangeForGrossSalary(float $grossAnnualSalary): int
    {
        $band = 0;
        try {
            $band = match (true) {
                $grossAnnualSalary >= $this->bands['bandA']['range'][0] && $grossAnnualSalary <= $this->bands['bandA']['range'][1] => 1,
                $grossAnnualSalary > $this->bands['bandB']['range'][0] && $grossAnnualSalary <= $this->bands['bandB']['range'][1] => 2,
                $grossAnnualSalary > $this->bands['bandC']['range'][0] => 3,
                default => throw new Exception("No valid band was entered")
            };
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $band;
    }

    public function calculateNetSalaryOnBands(float $grossAnnualSalary): SalaryDto
    {
        $bandMatch = $this->getTaxBandRangeForGrossSalary($grossAnnualSalary);

        $salaryDto = new SalaryDto();
        $grossMonthlySalary = $grossAnnualSalary / 12;
        $salaryDto->setGrossMonthlySalary($grossMonthlySalary)
            ->setGrossAnnualSalary($grossAnnualSalary);

        // Initialize default values
        $annualTaxPaid = 0;
        $monthlyTaxPaid = 0;
        $netAnnualSalary = $grossAnnualSalary;
        $netMonthlySalary = $grossMonthlySalary;

        if ($bandMatch === 1) {
            $salaryDto->setAnnualTaxPaid($annualTaxPaid)
                ->setMonthlyTaxPaid($monthlyTaxPaid)
                ->setNetAnnualSalary($grossAnnualSalary)
                ->setNetMonthlySalary($grossMonthlySalary);
        }

        if ($bandMatch === 2) {
            $annualTaxPaid = 20 / 100 * ($grossAnnualSalary - 5000);
            $monthlyTaxPaid = $annualTaxPaid / 12;
            $netAnnualSalary = $grossAnnualSalary - $annualTaxPaid;
            $netMonthlySalary = $grossMonthlySalary - $monthlyTaxPaid;
        }

        if ($bandMatch === 3) {
            $annualTaxPaidBandB = 3000; // 15000 * 20% = 3000
            $annualTaxPaidBandC = 40 / 100 * ($grossAnnualSalary - 20000);
            $annualTaxPaid = $annualTaxPaidBandB + $annualTaxPaidBandC;
            $monthlyTaxPaid = $annualTaxPaid / 12;
            $netAnnualSalary = $grossAnnualSalary - $annualTaxPaid;
            $netMonthlySalary = $grossMonthlySalary - $monthlyTaxPaid;
        }

        $salaryDto->setAnnualTaxPaid($annualTaxPaid)
            ->setMonthlyTaxPaid($monthlyTaxPaid)
            ->setNetAnnualSalary($netAnnualSalary)
            ->setNetMonthlySalary($netMonthlySalary);

        return $salaryDto;
    }
}
