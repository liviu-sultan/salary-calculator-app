<?php

namespace App\Http\Controllers;

use App\Services\TaxBandBuilderService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryController extends Controller
{
    protected TaxBandBuilderService $taxBandBuilderService;

    public function __construct(TaxBandBuilderService $taxBandBuilderService)
    {
        $this->taxBandBuilderService = $taxBandBuilderService;
    }

    public function show(Request $request): View
    {
        if ($request->isMethod('GET')) {
            return view('salary');
        }

        $grossAnnualSalary = $request->input('gross_salary');
        $salaryDto = $this->taxBandBuilderService->calculateNetSalaryOnBands($grossAnnualSalary);
        $currencySymbol = '£';

        return view('salary', [
            'salaryDto' => $salaryDto,
            'currencySymbol' => $currencySymbol,
            'grossSalary' =>  $salaryDto->getGrossAnnualSalary(),
        ]);
    }
}
