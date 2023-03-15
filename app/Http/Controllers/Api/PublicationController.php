<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

Use App\Models\Image;
Use App\Models\Publication;
Use App\Helpers\Tools;

class PublicationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = Publication::all();
        return response()->json([
            'status' => 'success',
            'publications' => $publications,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {		
		/*$this->validate($request->state, [
            'txtcategory' => ['required', 'integer'],
			'txttitle' => ['required', 'string'],
			'txtslug' => ['required', 'string'],
			'txtshort' => ['required', 'integer'],
			'txtlong' => ['required', 'integer'],
        ]);*/
		
		$imageName = time().'-'.$_FILES['file']['name']['txtimage'];
		$publication = Publication::create([
			'id_category' => $request->state["txtcategory"],
            'title' => $request->state["txttitle"],
            'slug' => $request->state["txtslug"],
			'short_text' => $request->state["txtshort"],
			'long_text' => $request->state["txtlong"],
			'image' => $imageName,
		]);
		
		$tools = Tools::upload_file(public_path("images"), $_FILES);
		//se puede hacer ajuste al tamaño de la imagen, pero para esta practica no aplica
		
		return response()->json([
			'status' => 'success',
			'message' => 'Publication created successfully',
			'publication' => $publication,
			'image' => $tools,
		]);
		
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
