<?php

namespace App\DTO;

class Salary
{
    public readonly float $grossMonthlySalary;
    public readonly float $netAnnualSalary;
    public readonly float $netMonthlySalary;
    public readonly float $monthlyTaxPaid;

    public function __construct(
        public readonly float $grossAnnualSalary,
        public readonly float $annualTaxPaid
    ) {
        $this->netAnnualSalary = $this->grossAnnualSalary - $this->annualTaxPaid;
        $this->grossMonthlySalary = $this->grossAnnualSalary / 12;
        $this->netMonthlySalary =  $this->netAnnualSalary / 12;
        $this->monthlyTaxPaid = $annualTaxPaid / 12;
    }
}
