<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Validator;


class ProfileController extends Controller
{
    public function create()
    {
        $profile=Profile::where('user_id', auth()->id())->first();
        if ($profile){
            return view('profiles.edit', compact('profile'));
        }else{
            return view('profiles.create');

        }
    }


    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required|numeric|digits:8',
            'country' => 'required|string|alpha',
            'address' => 'required|string',
            'town' => 'required|string|alpha',
            'postcode' => 'required|numeric',
             'description' => 'nullable|string',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'phone.required' => 'Phone is required.',
            'phone.numeric' => 'Phone must be a numeric value.',
            'phone.digits' => 'Phone must be exactly 8 digits.',
            'country.required' => 'Country is required',
            'country.string' => 'Country must be a string value.',
            'country.alpha' => 'Country must consist of letters only.',
            'address.required' => 'Address is required',
            'address.string' => 'Address must be a string value.',
            'town.required' => 'Town is required',
            'town.string' => 'Town must be a string value.',
            'town.alpha' => 'Town must consist of letters only.',
            'postcode.required' => 'Postcode is required',
            'postcode.numeric' => 'Postcode must be a numeric value',
            'description.string' => 'Description must be a string value',  
            'profile_picture.image' => 'Profile picture must be an image.',
            'profile_picture.mimes' => 'Profile picture must be a file of type: jpeg, png, jpg, gif.',
            'profile_picture.max' => 'Profile picture must not be greater than 2MB.',
        ]);
    
    
        if ($request->hasFile('profile_picture')) {
            $image = $request->file('profile_picture');
            $storagePath = 'images/';
            $imageName = time() . rand(1, 99) . '.' . $image->getClientOriginalExtension();
            $image->move($storagePath, $imageName);

            
        }


        $newProfile = new Profile([
            'phone' => $request->input('phone'),
            'country' => $request->input('country'),
            'address' => $request->input('address'),
            'town' => $request->input('town'),
            'postcode' => $request->input('postcode'),
            'description' => $request->input('description'),
            'profile_picture' => $imageName, 


        ]);
        $newProfile->user_id = auth()->id();
        $user =User::find(auth()->id());
        $newProfile->name=$user->name;
        $newProfile->save();
     
         return redirect()->route('user')->with('success', 'Profile created successfully');
      
    }
    
    public function edit($id)
{
    $profile = Profile::find($id); 

    return view('profiles.edit', compact('profile'));
}

public function update(Request $request, $id)
{
    $profile = Profile::find($id); 

    $request->validate([
        'phone' => 'required|numeric|digits:8',
        'country' => 'required|string|alpha',
        'address' => 'required|string',
        'town' => 'required|string|alpha',
        'postcode' => 'required|numeric',
        'description' => 'nullable|string',
    ], [
        'phone.required' => 'Phone is required.',
        'phone.numeric' => 'Phone must be a numeric value.',
        'phone.digits' => 'Phone must be exactly 8 digits.',
        'country.required' => 'Country is required',
        'country.string' => 'Country must be a string value.',
        'country.alpha' => 'Country must consist of letters only.',
        'address.required' => 'Address is required',
        'address.string' => 'Address must be a string value.',
        'town.required' => 'Town is required',
        'town.string' => 'Town must be a string value.',
        'town.alpha' => 'Town must consist of letters only.',
        'postcode.required' => 'Postcode is required',
        'postcode.numeric' => 'Postcode must be a numeric value',
        'description.string' => 'Description must be a string value', 
    ]);

    $profileData = $request->all();

    $profile->update($profileData);

    return redirect()->route('user')->with('success', 'Profile updated successfully');
}

public function destroy($id)
{
    // Delete a post
    $profile = Profile::find($id);
    $profile->delete();

    return redirect()->route('home');
}
}
