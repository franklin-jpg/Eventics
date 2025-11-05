<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EventCategory;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $categories =  EventCategory::all();
        // //or
        $categories =  EventCategory::paginate(10);
        //or
        // $categories = EventCategory::where('status', 'active')->get();


        $archivedCount = EventCategory::onlyTrashed()->count();

        return view('admin.event-category.index', compact('categories', 'archivedCount'));
        //   return view('admin.event-category.index', ['categories' => $categories]); array method

    }

    public function archived()
    {
        $categories = EventCategory::onlyTrashed()->paginate(1);
        $activeCount = EventCategory::count();

        return view('admin.event-category.archived', compact('categories', 'activeCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.event-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'category_name' => 'required|unique:event_categories,name',
            'category_status' => 'required',
            'category_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ], [
            'category_image.image' => 'file must be an image'
        ]);



        try {

            $image = $request->file('category_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $storagePath = 'category_image';

            $imagePath = $image->storeAs($storagePath, $fileName, 'public');
            // $imagePath = $image->store()

            // hybrid method of putting data into the database
            EventCategory::create([
                'name' => $validated['category_name'],
                'slug' => Str::slug($validated['category_name']),
                'status' => $validated['category_status'],
                'image' => $fileName
            ]);

            //** mass assign */
            // EventCategory::create($validated);



            //** manual way of putting data in into the database */

            //             $category = new EventCategory();
            // $category->name = $validated['category_name'];
            // $category->slug = Str::slug($validated['category_name']);
            // $category->status = $validated['category_status'];
            // $category->image = $fileName;
            // $category->save();


            return redirect()->route('admin.event-categories.index')->with('success', 'Category created 
            successfully');
        } catch (Exception $e) {
            if (isset($fileName)) {
               Storage::disk('public')->delete('category_image/' . $fileName);
            }
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EventCategory $eventCategory)
    {
        return view('admin.event-category.edit', compact('eventCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EventCategory $eventCategory)
    {
          $validated = $request->validate([
            'category_name' => 'required|unique:event_categories,name,' . $eventCategory->id,
            'category_status' => 'required',
            'category_image' => ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],

        ], [
            'category_image.image' => 'file must be an image'
        ]);

        try{

            $data = [
                'name' => $validated['category_name'],
                'slug' => Str::slug($validated['category_name']),
                'status' => $validated['category_status']
            ];

            if($request->hasFile('category_image')) {
                if($eventCategory->image){
                    storage::disk('public')->delete('category-image/' . $eventCategory->image);
                }

                  $image = $request->file('category_image');
            $fileName = Str::uuid() . '.' . $image->getClientOriginalExtension();
            $storagePath = 'category_image';
            $imagePath = $image->storeAs($storagePath, $fileName, 'public');
            
            $data['image'] = $fileName;
            }

            $eventCategory->update($data);
            return redirect()->route('admin.event-categories.index')->with('success', 'Category updated successfully');
        }catch(Exception $e) {

            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EventCategory $eventCategory)
    {
        // dd($eventCategory);
        $eventCategory->delete();
        return redirect()->back()->with('success', 'Category archived successfully');
    }

    public function restore($id)
    {

        $category = EventCategory::onlyTrashed()->findOrFail($id);
        $category->restore();

        return redirect()->route('admin.event-categories.archived')->with('success', 
        'Event category restored successfully');
    }


    public function forceDelete($id)
    {

        $category = EventCategory::onlyTrashed()->findOrFail($id);
        if($category->image){
            Storage::disk('public')->delete('category-image/'. $category->image);
        }
        $category->forceDelete();
        return redirect()->route('admin.event-categories.archived')->with('success', 'Event Category permanebtly deleted');
    }
}



