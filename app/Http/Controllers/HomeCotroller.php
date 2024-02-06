<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class HomeCotroller extends Controller
{
    protected function theme(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mode' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => 400,
                'message' => $validator->messages()
            ]);
        } else {

            $id = auth()->user()->id;

            $users = User::findOrFail($id);
            $users->mode = $request->input('mode');
            $users->update();

            return response()->json([
                'success' => 200,
            ]);
        }
    }
}
