<?php

namespace App\Http\Controllers;
use App\Models\Category; 
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;


class CategoryController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $trashed = $request->input('filter');
       
    
        if ($trashed === 'all') {
            $categories = Category::withTrashed()->get();
          
        } elseif ($trashed === 'archive') {
            $categories = Category::onlyTrashed()->get();
        } else {
            $categories =  Category::all();
        }
    
        return view('admin.category', compact('categories', 'trashed'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        Category::create($request->validated());
       
        return redirect('/admin/category')->with('success', 'Category created successfully.');
                         
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $Category)
    {
           
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $Category)
    {
        $Category->update($request->validated());
    
        return redirect()->back()->with('success', 'Category updated successfully.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $Category)
    {
        $Category->delete();
        return redirect()->back()->with('success', 'Category deleted successfully.');

    }


    public function deleted()
    {
        $deletedCategories = Category::onlyTrashed()->get();
        
        return view('admin.category', compact('deletedCategories'));
    }
     /**
     * restore the specified resource from storage.
     */

    public function restore(Category $category)
    {
        $category->restore();

        return redirect()->back()->with('success', 'Category restored successfully.');
    }
}
