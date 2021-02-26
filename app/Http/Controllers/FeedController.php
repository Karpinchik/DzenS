<?php


namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeedController extends Controller
{

    public function index(Request $request)
    {

        if ($request->isMethod('get')) {
            $results = DB::select('select * from feed');
            return view('feedback_form', compact('results'));

        }

        if ($request->isMethod('post')) {

            $this->validate($request, [
                'name' => 'required|max:10',
                'email' => 'required|email',
                'phone' => 'required',
                'message' => 'required',
            ]);

            $name = $request->input('name');
            $email = $request->input('email');
            $phone = $request->input('phone');
            $message = $request->input('message');
            $redactor = 0;
            $created_at = date("Y-m-d H:i:s");

            $data_feed_back = [$name, $email, $phone, $message, 0, $redactor, $created_at];

            DB::insert('insert into feed (name, email, phone, message, confirmed, redactor, created_at) 
values (?, ?, ?, ?, ?, ?, ?)', $data_feed_back);

            $results[] = 'ok';
            return view('feedback_form', compact('results'));
        }
    }
}
