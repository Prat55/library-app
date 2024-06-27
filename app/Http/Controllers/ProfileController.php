<?php

namespace App\Http\Controllers;

use App\Models\AssignBook;
use App\Models\Faculty;
use App\Models\User;
use App\Models\UserHistory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    protected function library_card_upload(Request $request)
    {
        $user = User::findOrFail(auth()->user()->id);
        $validator = Validator::make($request->all(), [
            'library_card' => 'mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->passes()) {
            if ($user) {
                if ($user->library_card) {
                    Storage::disk('public')->delete($user->library_card);
                }
                $user->library_card = $request->library_card->store('library-cards', 'public');
                $user->update();

                return redirect()->back()->with('success', 'Library card uploaded successfully');
            } else {
                return redirect()->back()->with('error', 'User not found!');
            }
        } else {
            return redirect()->back()
                ->withErrors($validator);
        }
    }

    protected function updateProfile(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $validator = Validator::make($request->all(), [
            'faculty' => 'required|numeric',
            'phone' => 'max_digits:10|min_digits:10|numeric'
        ]);

        if ($validator->passes()) {
            if ($user) {
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

    protected function updatePassword(Request $request)
    {
        $user = User::where('id', auth()->user()->id)->first();
        $validator = Validator::make($request->all(), [
            'currentPassword' => 'required|min:8|max:16',
            'newPassword' => 'required|min:8|max:16',
            'confirmNewPassword' => 'required|same:newPassword',
        ]);

        if ($validator->passes()) {
            if ($user) {
                if (Hash::check($request->currentPassword, $user->password)) {
                    if ($request->newPassword != $request->currentPassword) {
                        $user->password = Hash::make($request->newPassword);
                        $user->update();

                        return redirect()->back()->with('success', 'Password change successfully!');
                    } else {
                        return redirect()->back()->with('error', 'New password cannot be same as current password!');
                    }
                } else {
                    return redirect()->back()->with('error', 'Please enter valid password!');
                }
            } else {
                return redirect()->back()->with('error', 'User not found!');
            }
        } else {
            return redirect()->back()
                ->withErrors($validator);
        }
    }

    protected function removeAccount()
    {
        $user = User::where('id', auth()->user()->id)->first();

        if ($user) {
            $assignBook = AssignBook::where('user_id', "$user->id")->first();

            if (!$assignBook) {
                $userHistory = UserHistory::create([
                    'old_id' => $user->id,
                    'name' => $user->name,
                    'email' => $user->email,
                    'faculty_id' => $user->faculty_id,
                    'phone' => $user->phone,
                    'profile_photo_path' => $user->profile_photo_path,
                    'library_card' => $user->library_card
                ]);
                $userHistory->save();

                $user->delete();
                return redirect()->route('login');
            } else {
                return redirect()->back()->with('error', 'Please return your book first!');
            }
        } else {
            return redirect()->back()->with('error', 'User not found!');
        }
    }
}
