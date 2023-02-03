<?php

namespace App\Http\Controllers;

use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LinkController extends Controller
{
    public function store(Request $request)
    {
        $randomString = Str::random(5);
        $formfill = $request->validate([
            'link' => 'required'
        ]);
        $formfill['short_link'] = $randomString;
        $formfill['user_id'] = Auth()->user()->id;

        Link::create($formfill);
        return back();
    }

    public function getlink(Link $link)
    {
    
        $link->increment('views');

        return view('shrt-link',['link' => $link->link]);
    }
}
