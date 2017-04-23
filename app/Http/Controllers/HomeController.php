<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Mail;
use App\Posting;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function upload(Request $request)
    {
        $this->validate($request, [

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);


        $image = $request->file('image');

        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();

        $destinationPath = public_path('/images');

        $image->move($destinationPath, $input['imagename']);


        $user = Auth::user();
        $user->profile_pic =  'http://localhost/public/images/' . $input['imagename'];
        $user->save();
        return redirect()->back();

    }

    public function sendEmail(Request $request){
        $name = $request->Name;
        $email = $request->Email;
        $message = $request->Message;

        Mail::raw($message . '- ' . $name, function($message) use ($email, $name) {
            $message->from($email, $name);
            $message->to('ehossain007@gmail.com');
        });

        return redirect()->back();
    }

    public function search(Request $request){
        $postings = Posting::where('title', 'like',  '%'.$request->search. '%' )->get();
        return view('search', compact('postings'));
    }

    public function book(Request $request){
        $name = $request->name;
        $contact_number = $request->contact_number;
        Mail::raw($request->date . '-' . $request->title . '- ' . $contact_number, function($message) use($name, $contact_number) {
            $message->from('property@example.com', $name);
            $message->to('ehossain007@gmail.com');
        });

        return redirect()->back();
    }
}
