<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\EventQuestion;
use App\Models\Response;
class EventController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Event::query();

    // Check if a search query is provided and not empty
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($subquery) use ($search) {
            $subquery->where('title', 'like', '%' . $search . '%')
                ->orWhere('description', 'like', '%' . $search . '%')
                ->orWhere('objective', 'like', '%' . $search . '%')
                ->orWhere('category', 'like', '%' . $search . '%');
        });
    }

    $events = $query->paginate(10);

    return view('admin.events.index', compact('events'));
       
    }
    
    public function indexQuestions()
    {
        $query = EventQuestion::all();

        return view('admin.events.questions');
    }
    public function indexReviews()
    {
        // $query = Review::all();

        return view('admin.events.reviews');
    }
    public function indexResponses()
    {
        $query = Response::all();

        return view('admin.events.responses');
    }
    public function show($id){
        $event = Event::findOrFail($id);
        return view('admin.events.show',compact('event'));
    }
    public function create()
    {
        return view('admin.events.create');
    }
    public function store(Request $request)
        {

    
       
            $validatedData = $request->validate([
                'title' => 'required|max:30',
                'description' => 'required|min:10',
                'objective'=> 'required',
                'category' => 'required|in:Person,Virtual',
                'start_date' => 'required|date|after:tomorrow',
                'end_date' => 'required|date|after:start_date',
                'max_participants' => 'required|integer',
                'amenities' => 'array', 
                'image_path'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ], [
                'title.required' => 'Please enter a title.',
                'title.max' => 'The title must not exceed 30 characters.',
                'description.required' => 'Please enter a description.',
                'description.min' => 'The description must be at least 50 characters long.',
                'objective.required' => 'Please provide an objective.',
                'objective.min' => 'The objective must be at least 10 characters long.',
                'category.required' => 'Please select a category.',
                'category.in' => 'The category must be either "Person" or "Virtual".',
                'start_date.required' => 'Please enter a start date.',
                'start_date.date' => 'Invalid date format for start date.',
                'start_date.after' => 'The event must start after tomorrow.',
                'end_date.required' => 'Please enter an end date.',
                'end_date.date' => 'Invalid date format for end date.',
                'end_date.after' => 'The end date must be after the start date.',
                'max_participants.required' => 'Please specify the maximum number of participants.',
                'max_participants.integer' => 'The maximum participants must be a whole number.',
                'amenities.array' => 'Amenities must be provided as an array.',
                'image_path.image' => 'The uploaded file is not an image.',
                'image_path.mimes' => 'The image must be in jpeg, png, jpg, or gif format.',
                'image_path.max' => 'The image file should not exceed 2MB in size.',
            ]);
         
            // Create the event
            $event = new Event([
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'objective' => $validatedData['objective'],
                'category' => $validatedData['category'],
                'start_date' => $validatedData['start_date'],
                'end_date' => $validatedData['end_date'],
                'max_participants' => $validatedData['max_participants'],
                'image_path'=> ''
               
            ]);
            if($request->hasfile('image_path')){
                $file = $request->file('image_path');
                $extension = $file->getClientOriginalExtension();
                $filename = time(). '.' .$extension;
                $file->move('images/events',$filename);
            $event->image_path = $filename;
    
            }else{
                $defaultImagePath = 'default-image-event.jpg';
                $event->image_path = $defaultImagePath;
            }
            $event->organizer_id = 1;
            $event->save();
            
    
            if (isset($validatedData['amenities'])) {
                $event->amenities()->createMany(array_map(function ($amenity) {
                    return ['name' => trim($amenity)];
                }, $validatedData['amenities']));
            }
         
            return redirect()->route('admin.events.index')->with('success', 'Event created successfully');
      
        }
    
       
  
    
    public function edit(Event $event)
    {
        return view('admin.events.edit', compact('event'));
    }

    public function update(Request $request,$id)
    {
       
 
         // Validate the form data
         $validatedData = $request->validate([
             'title' => 'required|max:30',
             'description' => 'required|min:10',
             'objective'=> 'required',
             'category' => 'required|in:Person,Virtual',
             'start_date' => 'required|date|after:tomorrow',
             'end_date' => 'required|date|after_or_equal:start_date',
             'max_participants' => 'required|integer',
             'amenities' => 'array', 
             'image_path'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
         ], [
             'title.required' => 'Please enter a title.',
             'title.max' => 'The title must not exceed 30 characters.',
             'description.required' => 'Please enter a description.',
             'description.min' => 'The description must be at least 50 characters long.',
             'objective.required' => 'Please provide an objective.',
             'objective.min' => 'The objective must be at least 10 characters long.',
             'category.required' => 'Please select a category.',
             'category.in' => 'The category must be either "Person" or "Virtual".',
             'start_date.required' => 'Please enter a start date.',
             'start_date.date' => 'Invalid date format for start date.',
             'start_date.after' => 'The event must start after tomorrow.',
             'end_date.required' => 'Please enter an end date.',
             'end_date.date' => 'Invalid date format for end date.',
             'end_date.after' => 'The end date must be after the start date.',
             'max_participants.required' => 'Please specify the maximum number of participants.',
             'max_participants.integer' => 'The maximum participants must be a whole number.',
             'amenities.array' => 'Amenities must be provided as an array.',
             'image_path.image' => 'The uploaded file is not an image.',
             'image_path.mimes' => 'The image must be in jpeg, png, jpg, or gif format.',
             'image_path.max' => 'The image file should not exceed 2MB in size.',
         ]);
 
         $event = Event::findOrFail($id);
 
    
        
         
 
         $event->update([
             'title' => $request->input('title'),
             'description' => $request->input('description'),
             'objective' => $request->input('objective'),
             'category' => $request->input('category'),
             'start_date' => $request->input('start_date'),
             'end_date' => $request->input('end_date'),
             
             'max_participants' => $request->input('max_participants'),
             'participants_count' => $event->participants_count, 
         ]);
    
 
         if($request->hasfile('image_path')){
             $file = $request->file('image_path');
             $extension = $file->getClientOriginalExtension();
             $filename = time(). '.' .$extension;
             $file->move('images/events',$filename);
             $event->image_path = $filename;
         }else{
             $event->image_path = $event->image_path;
         }
  
 
         if (isset($validatedData['amenities'])) {
             $event->amenities()->createMany(array_map(function ($amenity) {
                 return ['name' => trim($amenity)];
             }, $validatedData['amenities']));
         }
 
         return redirect()->route('events.index')->with('success', 'Event updated successfully');
     
     }

    public function destroy(Event $event)
    {
        // if (auth()->user()->id === $event->organizer_id) {
            $event->delete();
            return redirect()->route('admin.events.index')->with('success', 'Event deleted successfully');
        // } else {
            // return redirect()->route('admin.events.index')->->with('error', 'You do not have permission to delete this event');
        // }
       
    }
}
