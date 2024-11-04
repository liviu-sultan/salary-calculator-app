<?php

namespace App\DTO;

class SalaryDto
{
    private float $grossAnnualSalary;
    private float $grossMonthlySalary;
    private float $netAnnualSalary;
    private float $netMonthlySalary;
    private float $annualTaxPaid;
    private float $monthlyTaxPaid;


    public function getGrossAnnualSalary(): float
    {
        return $this->grossAnnualSalary;
    }

    public function setGrossAnnualSalary(float $grossAnnualSalary): SalaryDto
    {
        $this->grossAnnualSalary = $grossAnnualSalary;
        return $this;
    }

    public function getGrossMonthlySalary(): float
    {
        return $this->grossMonthlySalary;
    }

    public function setGrossMonthlySalary(float $grossMonthlySalary): SalaryDto
    {
        $this->grossMonthlySalary = $grossMonthlySalary;
        return $this;
    }

    public function getNetAnnualSalary(): float
    {
        return $this->netAnnualSalary;
    }

    public function setNetAnnualSalary(float $netAnnualSalary): SalaryDto
    {
        $this->netAnnualSalary = $netAnnualSalary;
        return $this;
    }

    public function getNetMonthlySalary(): float
    {
        return $this->netMonthlySalary;
    }

    public function setNetMonthlySalary(float $netMonthlySalary): SalaryDto
    {
        $this->netMonthlySalary = $netMonthlySalary;
        return $this;
    }

    public function getAnnualTaxPaid(): float
    {
        return $this->annualTaxPaid;
    }

    public function setAnnualTaxPaid(float $annualTaxPaid): SalaryDto
    {
        $this->annualTaxPaid = $annualTaxPaid;
        return $this;
    }

    public function getMonthlyTaxPaid(): float
    {
        return $this->monthlyTaxPaid;
    }

    public function setMonthlyTaxPaid(float $monthlyTaxPaid): SalaryDto
    {
        $this->monthlyTaxPaid = $monthlyTaxPaid;
        return $this;
    }
}
