<?php

namespace App\Http\Controllers;

use App\Http\Resources\AddressCollection;
use App\Http\Resources\AddressResource;
use App\Http\Resources\CategoryResouce;
use App\Http\Resources\ObjectCollection;
use App\Http\Resources\OrganizationResouce;
use App\Http\Resources\PhotoCollection;
use App\Http\Resources\SubjectResouce;
use App\Models\Address;
use App\Models\Category;
use App\Models\Objects;
use App\Models\Organization;
use App\Models\Subject;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{

    /**
     * @return View
     */
    public function imprint(): View
    {
        return view('pages.imprint');
    }

    public function legal_notice(): View
    {
        return view('pages.legal_notice');
    }
}
