<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Lead;
use App\Mail\SendNewMail;
use App\Mail\SendNewMailGuest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ]);
        }
        else {

            $new_lead = new Lead();
            $new_lead->fill($data);
            $new_lead->save();

            Mail::to('admin@me.com')->send(new SendNewMail($new_lead));
            return response()->json([
                'success' => true
            ]);
        }

    }
}
