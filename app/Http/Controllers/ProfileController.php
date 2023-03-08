<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Booking;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
class ProfileController extends Controller
{
    //
    public function changePassword(Request $request){

        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("Error","Your current password does not matches with the password you provided. Please try again.");
        }

        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){
            //Current password and new password are same
            return redirect()->back()->with("Error","New Password cannot be same as your current password. Please choose a different password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new-password'));
            if(! $user->save()){
                return redirect()->back()->with("Error","Your current password does not matches with the password you provided. Please try again.");
            }

        return redirect()->back()->with("success","Password changed successfully ");

    }

    public function profileUpdate(Request $request){
        //   dd($request->all());
        $user = Auth::user();
        //  dd($user);
        $data = $request->validate([
            'name' => ['required', 'string', 'max:50'],
            'email' => 'required|email|max:225',
          'phone' => ['required', 'string', 'max:255', Rule::unique('users')->ignore(auth()->user()->id, 'id')],
        ]);


// dd($data);
                $user->update($data);
                session()->flash('success', __('Updated Successfully'));
            // Auth::user()->fill($request->all())->save();
        return redirect()->back();

}



public function cancelBooking(Request $request, $id)
    {
// dd($request->is_canceled);



        $booking = Booking ::findOrFail($id);
        if(Auth::user()->id == $booking->user_id){
       $booking-> is_canceled = '1';


            $booking->save();
        session() -> flash('success', 'Updated successfully');
        }else{
            session() -> flash('Error', 'Not Authorized');
        }
        return redirect()->back();
    }
}
