<?php

namespace App\Http\Controllers;

use App\Posting;
use Illuminate\Http\Request;

class PostingController extends Controller
{
    public function create(){
        return view('posting.create');
    }

    public function store(Request $request){
        $posting = Posting::create([
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/posting-images');

        $image->move($destinationPath, $input['imagename']);

        $posting->image =  'http://localhost/public/posting-images/' . $input['imagename'];

        $posting->save();

        return redirect('/');


    }

    public function show(Posting $posting){
        return view('posting.show', compact('posting'));
    }
}
