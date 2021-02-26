<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Auth;

class AdminController extends Controller
{

    public function admin (Request $request)
    {

        if(empty($request->user())) return Redirect::action('FeedController@index');
        $user_name = $request->user()->name;

        $id = ($request->input('id'));

        if ($request->isMethod('get'))
        {
            $results = DB::select('select * from feed');
            return view('redactor', compact('results'));
        }


        if (isset($_POST['btn_redaction']))
        {
            $this->validate($request, [
                'message' => 'required',
            ]);

            $id = ($request->input('id'));
            $message = $request->input('message');
            $confirmed = ($request->input('confirmed') == "on") ? 1 :0 ;
            $updated_at = date("Y-m-d H:i:s");
            $redactor = $user_name;

            DB::table('feed')
                ->where('id', $id)
                ->update(['message'=> $message, 'confirmed' => $confirmed, 'redactor' => $redactor,
                          'updated_at'=>$updated_at]);
            return Redirect::action('AdminController@admin');
        }

        if(isset($_POST['btn_delete']))
        {
            DB::delete('delete from feed where id='.$id);
            return Redirect::action('AdminController@admin');
        }

    }
}
