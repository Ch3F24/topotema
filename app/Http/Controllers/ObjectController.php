<?php

namespace App\Http\Controllers;

use App\Http\Resources\PhotoCollection;
use App\Models\Objects;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObjectController extends Controller
{
    /**
     * @param Objects $object
     * @return View
     */
    public function show(Objects $object): View
    {
        $object->load([
            'address',
            'addresses',
            'category',
            'organizations',
            'photos',
            'documents',
            'memoirs',
            'videos',
            'photos.file'
        ]);

        $photos = PhotoCollection::collection($object->photos);

        return view('pages.object',compact('object','photos'));
    }

    /**
     * @param Request $request
     * @return View
     */
    public function search(Request $request): View
    {
        //Abort if request not contain query param.
        abort_if(!$request->has('query'),404);

        $query = $request->get('query');

        $results = Objects::query()
            ->whereRaw(DB::raw("lower(content) LIKE '%" . strtolower($query) . "%'"))
            ->get();

        return view('pages.search',compact('results','query'));

    }
}
