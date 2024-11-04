<?php

namespace App\Facade;

use App\DTO\Salary;

class SalaryView
{
    private const CURRENCY = '£';
    public readonly string $grossMonthlySalary;
    public readonly string $netAnnualSalary;
    public readonly string $netMonthlySalary;
    public readonly string $monthlyTaxPaid;
    public readonly string $grossAnnualSalary;
    public readonly string $annualTaxPaid;


    public function __construct(private readonly Salary $salary)
    {
        $this->grossMonthlySalary = self::CURRENCY . number_format($this->salary->grossMonthlySalary, 2);
        $this->netAnnualSalary = self::CURRENCY . number_format($this->salary->netAnnualSalary, 2);
        $this->netMonthlySalary = self::CURRENCY . number_format($this->salary->netMonthlySalary, 2);
        $this->monthlyTaxPaid = self::CURRENCY . number_format($this->salary->monthlyTaxPaid, 2);
        $this->grossAnnualSalary = self::CURRENCY . number_format($this->salary->grossAnnualSalary, 2);
        $this->annualTaxPaid = self::CURRENCY . number_format($this->salary->annualTaxPaid, 2);
    }
}
