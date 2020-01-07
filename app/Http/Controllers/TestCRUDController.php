<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TestCRUD;

class TestCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $test = TestCRUD::orderBy('created_at','desc')->paginate(5);
        // $test = TestCRUD::paginate(10);                              // no order by on total
        return view('test_view.index',compact('test'));

        //        $test = TestCRUD::all();                              // just total
        //        return view('test_view.index', compact('test'));      // total
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('test_view.insertform');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:100',
	        'description' => 'required',
        ]);
        $test = TestCRUD::create($validatedData);
   
        return redirect('/test_crud')->with('success', 'test is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $test = TestCRUD::find($id);
         return view('test_view.view', compact('test'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $test = TestCRUD::findOrFail($id);

        return view('test_view.modifyform', compact('test'));
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
        $validatedData = $request->validate([
            'title' => 'required|max:100',
	        'description' => 'required'
        ]);

        TestCRUD::whereId($id)->update($validatedData);

        return redirect('/test_crud')->with('success', 'test is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test = TestCRUD::findOrFail($id);
        $test->delete();

        return redirect('/test_crud')->with('success', 'test is successfully deleted');
    }

  
    // public function result(Request  $request)
    // {
    //     $result=TestCRUD::where('title', 'LIKE', "%{$request->input('query')}%")->get();
    //     return response()->json($result);
    // }

}
