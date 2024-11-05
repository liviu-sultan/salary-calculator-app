<?php

namespace Tests\Unit\Services;

use App\DTO\Salary;
use App\Models\TaxBand;
use App\Services\SalaryService;
use Tests\TestCase;

class SalaryServiceTest extends TestCase
{
    protected SalaryService $salaryService;
    protected $taxBand;

    /**
     * @throws \PHPUnit\Framework\MockObject\Exception
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->salaryService = new SalaryService();
    }

    public function testCalculateInBandA()
    {
        $grossAnnualSalary = 3000;
        $expected = new Salary($grossAnnualSalary, 0);

        $result = $this->salaryService->calculate($grossAnnualSalary);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateInBandB()
    {
        $grossAnnualSalary = 10000;
        $expected = new Salary($grossAnnualSalary, 1000);

        $result = $this->salaryService->calculate($grossAnnualSalary);

        $this->assertEquals($expected, $result);
    }

    public function testCalculateInBandC()
    {
        $grossAnnualSalary = 40000;
        $expected = new Salary($grossAnnualSalary, 11000);

        $result = $this->salaryService->calculate($grossAnnualSalary);

        $this->assertEquals($expected, $result);
    }
}
