<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use App\Models\SubSubCategory;
use Carbon\Carbon;

class SubCategoryController extends Controller
{
    
        public function SubCategoryView(){ 
            $categories = Category::orderBy('category_name_en','ASC')->get();
            $subcategory=SubCategory::latest()->get();
            return view('backend.category.subcategory_view',compact('subcategory', 'categories'));
         }

         public function SubCategoryStore(Request $request){
            $request -> validate([
    
                'category_id'=>'required',
                'subcategory_name_en'=>'required',
                'subcategory_name_kis'=>'required',
            ],[
                'category_id.required'=>'Please Select Any Option',
                'subcategory_name_en.required'=>'Input SubCategory English Name',
    
            ]);
            
           
    
            SubCategory::insert([
                
                'category_id' => $request -> category_id,
                'subcategory_name_en' => $request -> subcategory_name_en,
                'subcategory_name_kis' => $request -> subcategory_name_kis,
                'subcategory_slug_en' =>  strtolower(str_replace('','-',$request -> subcategory_name_en)),
                'subcategory_slug_kis' => strtolower(str_replace('','-',$request -> subcategory_name_kis)),
               
            ]);
            $notification = array(
                'message'=> 'SubCategory Iserted Successfully',
                'alert-type'=> 'success'
            );
            return redirect()->back()-> with ($notification);


        }
        public function SubCategoryEdit($id){

            $categories = Category::orderBy('category_name_en','ASC')->get();
            $subcategory= SubCategory::findOrFail($id);
            return view('backend.category.subcategory_edit',compact('subcategory', 'categories'));
        }
        public function SubCategoryUpdate(Request $request){

        $subcat_id = $request->id;
        
        SubCategory::findOrFAil($subcat_id)->update([
                
            'category_id' => $request -> category_id,
            'subcategory_name_en' => $request -> subcategory_name_en,
            'subcategory_name_kis' => $request -> subcategory_name_kis,
            'subcategory_slug_en' =>  strtolower(str_replace('','-',$request -> subcategory_name_en)),
            'subcategory_slug_kis' => strtolower(str_replace('','-',$request -> subcategory_name_kis)),
           
        ]);
        $notification = array(
            'message'=> 'SubCategory Updated Successfully',
            'alert-type'=> 'info'
        );
        return redirect()->route('all.subcategory')-> with ($notification);
    }
    public function SubCategoryDelete($id){

        SubCategory::findOrFail($id)->delete();

        $notification = array(
            'message'=> 'SubCategory Deleted Successfully',
            'alert-type'=> 'success'
        );

        return redirect()->back()-> with ($notification);
    }

    // <!-- Add SubSubCategory methods -->
   public function SubSubCategoryView (){

            $categories = Category::orderBy('category_name_en','ASC')->get();
            $subsubcategory=SubSubCategory::latest()->get();
            return view('backend.category.subsubcategory_view',compact('subsubcategory', 'categories'));
   }

   public function GetSubCategory($category_id){
        $subcat=SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','ASC')->get();
        return json_encode($subcat);

   }

   public function GetSubSubCategory($subcategory_id){
    $subsubcat=SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','ASC')->get();
    return json_encode($subsubcat);

}
      public function SubSubCategoryStore(Request $request){
      $request -> validate([
    
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'subsubcategory_name_en'=>'required',
        'subsubcategory_name_kis'=>'required',
    ],[
        'category_id.required'=>'Please Select Any Option',
        'subsubcategory_name_en.required'=>'Input SubSubCategory English Name',

    ]);
    
   

    subSubCategory::insert([
        
        'category_id' => $request -> category_id,
        'subcategory_id' => $request -> subcategory_id,
        'subsubcategory_name_en' => $request -> subsubcategory_name_en,
        'subsubcategory_name_kis' => $request -> subsubcategory_name_kis,
        'subsubcategory_slug_en' =>  strtolower(str_replace('','-',$request -> subsubcategory_name_en)),
        'subsubcategory_slug_kis' => strtolower(str_replace('','-',$request -> subsubcategory_name_kis)),
       
    ]);
    $notification = array(
        'message'=> 'SubSubCategory Iserted Successfully',
        'alert-type'=> 'success'
    );
    return redirect()->back()-> with ($notification);

   }
   public function SubSubCategoryEdit($id){

    $categories = Category::orderBy('category_name_en','ASC')->get();
    $subcategories = SubCategory::orderBy('subcategory_name_en','ASC')->get();
    $subsubcategories = SubSubCategory::findOrFail($id);
    return view('backend.category.subsubcategory_edit',compact('categories','subcategories','subsubcategories'));

   }

   public function SubSubCategoryUpdate(Request $request){
    $subsubcat_id = $request->id;

    SubSubCategory::findOrFail($subsubcat_id)->update([
        
        'category_id' => $request -> category_id,
        'subcategory_id' => $request -> subcategory_id,
        'subsubcategory_name_en' => $request -> subsubcategory_name_en,
        'subsubcategory_name_kis' => $request -> subsubcategory_name_kis,
        'subsubcategory_slug_en' =>  strtolower(str_replace('','-',$request -> subsubcategory_name_en)),
        'subsubcategory_slug_kis' => strtolower(str_replace('','-',$request -> subsubcategory_name_kis)),
       
    ]);
    $notification = array(
        'message'=> 'SubSubCategory Updated Successfully',
        'alert-type'=> 'info'
    );
    return redirect()->route('all.subsubcategory')-> with ($notification);

   }
   public function SubSubCategoryDelete($id){

    SubSubCategory::findOrFail($id)->delete();

    $notification = array(
        'message'=> 'SubSubCategory Deleted Successfully',
        'alert-type'=> 'success'
    );

    return redirect()->back()-> with ($notification);


    
}
    
}