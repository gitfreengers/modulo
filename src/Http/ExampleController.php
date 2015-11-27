<?php

namespace Freengersdev\firstmodule\Http;

use App\Http\Controllers\Controller;
use Freengersdev\firstmodule\Example;

class ExampleController extends Controller
{
    public function index()
    {
        $examples = Example::orderBy('id', 'desc')->get();

        return view('example::index')->with('examples', $examples);
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    	$catalogTypes = CatalogTypes::find($id);
    	return view('catalogs.form', ['title'=>'Nuevo catalogo', 'catalogs' => new Catalogs(), 'catalogTypes'=>$catalogTypes, 'id'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$catalog = new Catalogs([
    		'catalogtypes_id' => $request->get('catalog_types_id'),
    		'name' => $request->get('name'),
    		'type' => $request->has('type')? $request->get('type') : null,
    		'amount_suggestion' => $request->has('amount_suggestion')? $request->get('amount_suggestion') : 0
    	]);
    	$catalog->save();
        return \Redirect::route('catalogos.index', [$request->get('catalog_types_id')])->with('success', 'Catalogo creado correctamente');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $catalog = Catalogs::find($id);
        $catalogTypes = CatalogTypes::find($catalog->catalogtypes_id);
    	return view('catalogs.form', ['title'=>'Editar catalogo', 'catalogs' => $catalog, 'catalogTypes'=>$catalogTypes, 'id'=>$catalogTypes->id]);
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
    	$mensaje = '';
    	$catalog = Catalogs::find($id);
    	$catalogTypes = CatalogTypes::find($catalog->catalogtypes_id);
    	if ($catalog->editable){
	    	$catalog->name = $request->get('name');
	    	$catalog->type = $request->has('type')? $request->get('type') : null;
	    	$catalog->amount_suggestion = $request->has('amount_suggestion')? $request->get('amount_suggestion') : null;
	    	$catalog->update();
	    	$mensaje = 'Dato actualizado correctamente';
    	}else{
    		$mensaje = 'Este catalogo no es editable ni se puede borrar';
    	}
    	
    	return \Redirect::route('catalogos.index', [$catalogTypes->id])->with('success', $mensaje);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    	$catalog = Catalogs::find($id);
        $catalogTypes = CatalogTypes::find($catalog->catalogtypes_id);
        $mensaje = '';
        if ($catalog->editable){
	    	Catalogs::destroy($id);
	    	$mensaje = 'Dato eliminado del catalogo';
        }else{
        	$mensaje = 'Este catalogo no es editable ni se puede borrar';
        }
    	return \Redirect::route('catalogos.index', [$catalogTypes->id])->with('success', $mensaje);
    }
}
