<?php

namespace App\Services;

use App\DTO\SalaryDto;

class TaxBandService
{
    protected TaxStrategyFactory $strategyFactory;

    public function __construct(TaxStrategyFactory $strategyFactory)
    {
        $this->strategyFactory = $strategyFactory;
    }

    /**
     * @throws \Exception
     */
    public function calculateNetSalary(float $grossAnnualSalary): SalaryDto
    {
        $strategy = $this->strategyFactory->create($grossAnnualSalary);
        return $strategy->calculate($grossAnnualSalary);
    }
}
