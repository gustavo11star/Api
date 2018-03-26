<?php

namespace App\Http\Controllers;

use Illuminate\Routing\ResponseFactory;

use Illuminate\Http\Response;

use Illuminate\Http\Request;

use Symfony\Component\HttpKernel\Exception\HttpException;

use App\Category;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();

        if (!is_null($categories)) {
            # code...
            return response()->json($categories,200);
        }

        return response()->json(['message' => 'No data exists'], 400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'description' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

        $post = $request->all();
        $category = Category::create($post);
        if (isset($category)) {
            # code...
            return response()->json($category, 200);
        }

        return response()->json(['message' => 'Invalid Data'], 400);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $category = Category::find($id);

        if (!is_null($category)) {
            # code...
            return response()->json($category,200);
        }

        return response()->json(['message' => 'Invalid Id'], 400);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validate = $request->validate([
            'description' => 'required|min:3|max:255',
            'status' => 'required',
        ]);

        $category = Category::find($id);

        if (is_null($category)) {
            # code...
            return response()->json(['message' => 'Invalid Id'], 400);
        }

        $post = $request->all();
        $post['status'] = (int)$post['status'];
        // $response = $category->save($post);
        $response = Category::where('id', $id)->update($post);

        if (isset($response) and $response == 1) {
            # code...
            $category = Category::find($id);
            return response()->json($category, 200);
        }

        return response()->json(['message' => 'Invalid Data'], 200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Category::destroy($id) == 1) {
            # code...
            return response()->json(['message' => 'been deleted successfully'], 200);
        }

        return response()->json(['message' => 'Invalid Id'], 400);
    }
}
