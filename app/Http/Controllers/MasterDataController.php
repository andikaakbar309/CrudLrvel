<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterCategory;
use Illuminate\Support\Facades\Session;

class MasterDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $cate = MasterCategory::orderBy('status', 'asc', "CASE WHEN status = 'active' THEN 0 ELSE 1 END")->paginate(5);
        $cate = MasterCategory::orderBy('seq', 'asc')->paginate(5);
        return view('categories/index')->with('data', $cate);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->session()->flash('id', $request->id);
        $request->session()->flash('name', $request->name);
        $request->session()->flash('description', $request->description);
        $request->session()->flash('seq', $request->seq);

        $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'seq'=>'required',
        ]);
        $cate = [
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'seq'=>$request->input('seq'),
        ];
        MasterCategory::create($cate);
        return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cate = MasterCategory::where('id', $id)->first();
        return view('/categories/show')->with('data', $cate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cate = MasterCategory::where('id', $id)->first();
        return view('/categories/edit')->with('data', $cate);
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
        $data = MasterCategory::findOrFail($id);

       $validasi = $request->validate([
            'name'=>'required',
            'description'=>'nullable',
            'seq'=>'required',
            'status'=>$data->status === 'inactive' ? 'required|in:Active,Inactive' : 'in:Active,Inactive'
        ]);

            if($data->status === 'Inactive' && $validasi['status'] === 'Active') {
                $data->status = 'Active';
                $data->is_deleted = false;
            }

            $data->save();

        $cate = [
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'seq'=>$request->input('seq')
        ];
        MasterCategory::where('id', $id)->update($cate);
        return redirect('/categories')->with('success', 'Succes edit data');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = MasterCategory::findOrFail($id);

        if ($data->status === 'Active') {
            $data->status = 'Inactive';
            $data->is_deleted = true;
            $data->save();
            return redirect('/categories')->with('success', 'Data is inactive');
        }
    }
}
