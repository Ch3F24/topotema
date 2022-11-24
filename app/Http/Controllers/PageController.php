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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function home()
    {
//        $addresses['features'] = AddressCollection::collection(Address::query()->with(['objects','objects.categories','objects.organizations'])->get());
        $objects['features'] = ObjectCollection::collection(Objects::query()->has('address')->with(['categories','organizations','addresses','address'])->get());
        $organizations = OrganizationResouce::collection(Organization::query()->get());
        $categories = CategoryResouce::collection(Category::query()->get());
        $subject_words = SubjectResouce::collection(Subject::query()->get());

        return view('pages.home',
            compact(
                'objects',
                'organizations',
                'categories',
                'subject_words'
            ));
    }

    public function address(Address $address)
    {
        //Load address relations.
        $address->load(['objects','objects.categories','objects.organizations','objects.photos','objects.photos.file']);
        $photos = PhotoCollection::collection($address->objects->first()->photos);

//        return $photos;

        return view('pages.object',compact('address','photos'));
    }

    public function object(Objects $object)
    {
        $object->load(['address','addresses','category','organizations','photos','photos.file']);

        $photos = PhotoCollection::collection($object->photos);

        return view('pages.object',compact('object','photos'));
    }

    public function search(Request $request)
    {
        //Abort if request not contain query param.
        abort_if(!$request->has('query'),404);

        $query = $request->get('query');

        $results = Objects::query()
            ->whereRaw(DB::raw("lower(content) LIKE '%" . strtolower($query) . "%'"))
            ->get();

        return view('pages.search',compact('results'));

    }
}
