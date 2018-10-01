<?php

namespace App\Http\Controllers\User;

use App\Story;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchArticlesController extends Controller
{
    public function search(Request $request)
    {
        # code...
        $keyword = $request->input('keyword');

        //$service = $service->newQuery();
        // Search for a service based on the subcategory.
        if ($keyword) {
            $stories = Story::where('title', 'LIKE', '%' . $keyword . '%')
                ->orWhere('body', 'LIKE', '%' . $keyword . '%')
                ->where('active', 1)
                ->paginate(5);
            if ($stories->count() > 0)
            {
                return view('user.search-results')
                    ->with('stories', $stories);
            } else {
                flash('Unfortunately no results were found')->error();
                return view('user.search-results', ['stories' => $stories]);
            }

        }else {
            flash('Searh fields you provided are empty')->error();
            return redirect()->back();
        }
    }

}
