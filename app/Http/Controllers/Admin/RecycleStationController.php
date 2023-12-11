<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RecycleStation;
use Illuminate\Support\Facades\Log;
class RecycleStationController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = RecycleStation::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function ($subquery) use ($search) {
                $subquery->where('name', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%')
                    ->orWhere('contact_email', 'like', '%' . $search . '%');
            });
        }
    
        $stations = $query->paginate(10);
    
        return view('admin.recycle-stations.index', compact('stations'));
    }

    public function create()
    {
        return view('admin.recycle-stations.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
            'description' => 'required',
            'contact_email' => 'required|email',
            'contact_phone' => 'required',
            'website' => 'nullable|url',
            'operating_hours' => 'nullable',
            'accepted_materials' => 'nullable',
            'services' => 'nullable',
            'accessibility' => 'nullable',
            'rating' => '',
            'image_path' => '',
            'status' => '',
            'date_added' => '2023-10-22 13:14:54',
        ]);
    
   
    
       
        $station = new RecycleStation([
            'name' => $request->input('name'),
            'address' => $request->input('address'),
            'latitude' => $request->input('latitude'),
            'longitude' => $request->input('longitude'),
            'description' => $request->input('description'),
            'contact_email' => $request->input('contact_email'),
            'contact_phone' => $request->input('contact_phone'),
            'website' => $request->input('website'),
            'operating_hours' => $request->input('operating_hours'),
            'accepted_materials' => $request->input('accepted_materials'),
            'services' => $request->input('services'),
            'accessibility' => $request->input('accessibility'),
            'rating' => $request->input('rating'),
            
            'status' => 'active',
            'date_added'=>'2023-10-22 13:14:54'
        ]);
        if($request->hasfile('image_path')){
            $file = $request->file('image_path');
            $extension = $file->getClientOriginalExtension();
            $filename = time(). '.' .$extension;
            $file->move('images/recycle-stations',$filename);
        $station->image_path = $filename;

        }else{
            $defaultImagePath = 'default-image-event.jpg';
            $station->image_path = $defaultImagePath;
        }
        $station->save();
        return redirect()->route('recycle-stations.index')->with('success', 'Station created successfully');
    }

    public function show($id)
    {
    }
    public function edit($id)
    {
        $station = RecycleStation::findOrFail($id);
        return view('admin.recycle-stations.edit', compact('station'));
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'name' => 'required|max:255',
        'address' => 'required',
        'latitude' => 'required',
        'longitude' => 'required',
        'description' => 'required',
        'contact_email' => 'required|email',
        'contact_phone' => 'required',
        'website' => 'nullable|url',
        'operating_hours' => 'required',
        'accepted_materials' => '',
        'services' => '',
        'accessibility' => '',
        'rating' => '',
        'image_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
       
    ]);

    $station = RecycleStation::findOrFail($id);

    $station->update($validatedData);

    if ($request->hasFile('image_path')) {
        if ($station->image_path && file_exists(public_path($station->image_path))) {
            unlink(public_path($station->image_path));
        }

        $imagePath = $request->file('image_path')->store('public/images/recycle-stations');
        $station->image_path = str_replace('public/', 'storage/', $imagePath);
    }

    $station->save();

    return redirect()->route('recycle-stations.index')->with('success', 'Recycle station updated successfully');
    }

    public function destroy($id)
    {
    $station = RecycleStation::findOrFail($id);

    if ($station->image_path && file_exists(public_path($station->image_path))) {
        unlink(public_path($station->image_path));
    }

    $station->delete();

    return redirect()->route('recycle-stations.index')->with('success', 'Recycle station deleted successfully');
    }
}
