<?php

namespace App\Http\Controllers;

use App\Facade\SalaryView;
use App\Services\SalaryService;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SalaryController extends Controller
{
    protected SalaryService $service;

    public function __construct(SalaryService $service)
    {
        $this->service = $service;
    }

    public function show(Request $request): View
    {
        if ($request->isMethod('GET')) {
            return view('salary');
        }

        $grossAnnualSalary = $request->input('gross_salary');
        $salaryDto = $this->service->calculate($grossAnnualSalary);

        return view('salary', [
            'salary' => new SalaryView($salaryDto)
        ]);
    }
}
