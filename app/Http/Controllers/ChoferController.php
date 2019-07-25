<?php

namespace App\Http\Controllers;

use App\Chofer;
use Illuminate\Http\Request;

class ChoferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Chofers=Chofer::orderBy('id','DESC')->paginate(10);
        return view('Chofer.index',compact('Chofers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isnew = true;
        $url= 'Chofer';
        $chofer = new Chofer();
        return view('Chofer.create', compact('isnew','url','chofer'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $this->validate($request,[ 'name'=>'required']);
        Chofer::create($request->all() );
        return redirect()->route('Chofer.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function show(Chofer $chofer)
    {
        //
         $chofer=Chofer::find($id);
        return  view('Chofer.show',compact('chofer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *  @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $chofer=Chofer::find($id);
          $isnew = false;
          $url= 'Chofer/'.$chofer->id;
        return view('Chofer.create',compact('chofer','isnew','url'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Chofer  $chofer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $this->validate($request,[ 'name'=>'required']);
 
        Chofer::find($id)->update($request->all());
        return redirect()->route('Chofer.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     *   @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
                Chofer::find($id)->delete();
        return redirect()->route('Chofer.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
