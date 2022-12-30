<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResouce;
use App\Http\Resources\ObjectCollection;
use App\Http\Resources\OrganizationResouce;
use App\Http\Resources\SubjectResouce;
use App\Models\Category;
use App\Models\Objects;
use App\Models\Organization;
use App\Models\Subject;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{

    /**
     * @return View
     */
    public function index(): View
    {
        $objects['features'] = ObjectCollection::collection(
            Objects::query()
                ->has('address')
                ->with(['categories','organizations','addresses','address','videos'])
                ->get()
        );

        $organizations = OrganizationResouce::collection(
            Organization::query()->get()
        );

        $categories = CategoryResouce::collection(
            Category::query()->get()
        );

        $subject_words = SubjectResouce::collection(
            Subject::query()->get()
        );

        return view('pages.home',
            compact(
                'objects',
                'organizations',
                'categories',
                'subject_words'
            ));
    }
}
