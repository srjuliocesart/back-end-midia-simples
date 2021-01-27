<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShortLink;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class ShortLinkController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        $shortLinks = ShortLink::where('user_id','=',$user->id)->get();

        //dd($shortLinks);
        return view('/dashboard',['shortLinks' => $shortLinks]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
           'link' => 'required|url'
        ]);

        $user = Auth::user();

        $input['link'] = $request->input('link');
        $input['code'] = Str::random(6);
        $input['user_id'] = $user->id;

        ShortLink::create($input);

        return redirect('/dashboard');
    }

    public function edit($id , ShortLink $shortLink){
        $shortLink = ShortLink::where('id','=',$id)->get();
        //dd($shortLink);
        return view('links.edit',['shortLink' => $shortLink]);
    }


    public function delete($id){

        ShortLink::whereId($id)->first()->delete();
        return view('/dashboard');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shortenLink($code)
    {
        $find = ShortLink::where('code', $code)->first();

        return redirect($find->link);
    }
}
