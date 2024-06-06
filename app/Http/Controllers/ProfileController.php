<?php

namespace App\Http\Controllers;

use App\Models\AssignBook;
use App\Models\Faculty;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{

    protected function profile()
    {
        return view('frontend.profile', [
            'issuedBook' => AssignBook::where('user_id', auth()->user()->id)->first(),
            'faculties' => Faculty::private()->get(),
        ]);
    }
    protected function changeProfilePhoto($uid, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 400,
                'errors' => $validator->messages(),
            ]);
        } else {
            $user = User::findOrFail($uid);

            if (file::exists("profile-img/" . $user->profile_photo_path)) {
                File::delete("profile-img/" . $user->profile_photo_path);
            }

            //? Store the new image in the database
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(\public_path("profile-img/"), $filename);


            if ($user) {
                $user->profile_photo_path = $filename;
                $user->update();

                return response()->json([
                    'status' => 200,
                    'message' => 'Profile Picture Updated Successfully',
                ]);
            } else {
                return response()->json([
                    'status' => 404,
                    'message' => "File Not Found!",
                ]);
            }
        }
    }

    protected function updateProfile(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $validator = Validator::make($request->all(), [
            'library_card' => 'mimes:png,jpg,jpeg',
            'faculty' => 'required|numeric',
            'phone' => 'max_digits:10|min_digits:10|numeric'
        ]);

        if ($validator->passes()) {
            if ($user) {

                if ($request->hasFile('library_card')) {
                    $user->library_card = $request->library_card->store('library-cards', 'public');
                }
                $user->faculty_id = $request->faculty;
                $user->phone = $request->phone;
                $user->update();

                return redirect()->back()->with('success', 'Information updated successfully');
            } else {
                return redirect()->back()->with('error', 'User not found!');
            }
        } else {
            return redirect()->back()
                ->withErrors($validator);
        }
    }
}
