<?php

namespace App\Http\Controllers;

use App\Services\TaxBandService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryController extends Controller
{
    protected TaxBandService $taxBandService;
    private const CURRENCY_SYMBOL = '£';

    public function __construct(TaxBandService $taxBandService)
    {
        $this->taxBandService = $taxBandService;
    }

    /**
     * @throws \Exception
     */
    public function show(Request $request): View
    {
        if ($request->isMethod('GET')) {
            return view('salary');
        }

        $grossAnnualSalary = $request->input('gross_salary');
        $salaryDto = $this->taxBandService->calculateNetSalary($grossAnnualSalary);

        return view('salary', [
            'salaryDto' => $salaryDto,
            'currencySymbol' => self::CURRENCY_SYMBOL,
            'grossSalary' =>  $salaryDto->getGrossAnnualSalary(),
        ]);
    }
}
