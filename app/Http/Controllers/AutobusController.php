<?php

namespace App\Http\Controllers;

use App\Autobus;
use App\Chofer;
use Illuminate\Http\Request;

class AutobusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $Autobuses=Autobus::orderBy('autobus.id','DESC')->leftjoin('chofer','chofer.id','=','autobus.id_chofer') ->paginate(10);
        return view('Autobus.index',compact('Autobuses'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $isnew = true;
        $url= 'Autobus';
        $autobus = new Autobus();
        $chofers = Chofer::all();
        return view('Autobus.create', compact('isnew','url','autobus','chofers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[ 'number'=>'required',
            'type'=>'required',
            'size'=>'required',
            'hLeave'=>'required',
            'dateLeave'=>'required',
            'id_chofer'=>'required'
            ]);
        Autobus::create($request->all() );
        return redirect()->route('Autobus.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function show(Autobus $autobus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autobus=Autobus::find($id);
        $isnew = false;
        $url= 'Autobus/'.$autobus->id;
        $chofers = Chofer::all();
        return view('Autobus.create',compact('autobus','isnew','url','chofers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[ 'number'=>'required',
            'type'=>'required',
            'size'=>'required',
            'hLeave'=>'required',
            'dateLeave'=>'required',
            'id_chofer'=>'required'
            ]);
         Autobus::find($id)->update($request->all());
        return redirect()->route('Autobus.index')->with('success','Registro actualizado satisfactoriamente');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Autobus  $autobus
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Autobus::find($id)->delete();
        return redirect()->route('Chofer.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
