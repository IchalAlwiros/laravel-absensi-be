<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    //show
    public function show(string $id){
        $company = Company::find($id);
        return ResponseHelper::sendSuccessResponse('view-company', ['company' => $company]);
    }
}
