<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use GuzzleHttp\Psr7\Message;

class ApiCategoryController extends Controller
{
    //getAPI Index
    public function index(){
        $categories = Category::all();

        //return response json Category
        if($categories){
            return response()->json([
                'success' => true,
                'message' => 'List Data Category',
                'data' => $categories,
            ],200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category Not Found',
                'data' => '',
            ],404);
        }
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        if($category){
            return response()->json([
                'success' => true,
                'message' => 'Create New category Successfull!',
                'data' => $category
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category fail to save',
                'data' => ''
            ], 404);
        }
    }

    public function update(Request $request, $id){
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
        ]);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if($category->save()){
            return response()->json([
                'success' => true,
                'message' => 'Update category Successfull!',
                'data' => $category
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category fail to update',
                'data' => ''
            ], 404);
        }
    }

    public function destroy($id){
        $category = Category::find($id);

        if($category->delete()){
            return response()->json([
                'success' => true,
                'message' => 'delete category Successfull!',
                'data' => $category
            ], 200);
        }else{
            return response()->json([
                'success' => false,
                'message' => 'Category fail to delete',
                'data' => ''
            ], 404);
        }
    }

}