<?php

namespace App\Http\Controllers;

use App\Mail\Form;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function submit(Request $request)
    {
        $data = [];
        $data['name'] = $request->get('name');
        $data['birthday'] = $request->get('birthday');
        $data['reference1'] = $request->get('reference-1');
        $data['reference2'] = $request->get('reference-2');
        $data['reference3'] = $request->get('reference-3');

        Mail::to(env('MAIL_ADDRESS_1'))->send(new Form($data));
        Mail::to(env('MAIL_ADDRESS_2'))->send(new Form($data));

        return redirect()->back();
    }
}
