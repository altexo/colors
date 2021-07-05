<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Color;

class ColorController extends Controller
{

    public $user;

    const NOT_SUFICIENT_PERMISIONS_MSG = 'No tiene los permisos para este recurso.';

    public function __construct()
    {
        $this->user = auth('api')->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Int $paginate = 6, Bool $xml = false)
    {
        if($xml) {
            return response()->xml(Color::paginate($paginate));
        }else {
           return response()->json(['success' => true, 'data' => Color::paginate($paginate)]);
        }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if ($this->user->role_id != 1) {
            return response()->json(['success' => false, self::NOT_SUFICIENT_PERMISIONS_MSG]); 
        }
        // Validaciones
        $this->validate($request, [
            'name' => 'required|min:3',
            'color' => 'required|min:3',
            'pantone' => 'required|min:3',
            'year' => 'required|min:4|max:4',
        ]);
        
        $color = new Color;

        $color->name = $request->name;
        $color->color = $request->color;
        $color->pantone = $request->pantone;
        $color->year = $request->year;

        $color->save();

        return response()->json( $color);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json(['success' => true, 'data' => Color::find($id)]);
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

        if ($this->user->role_id != 1) {
            return response()->json(['success' => false, self::NOT_SUFICIENT_PERMISIONS_MSG]); 
        }

          // Validaciones
          $this->validate($request, [
            'name' => 'required|min:3',
            'color' => 'required|min:3',
            'pantone' => 'required|min:3',
            'year' => 'required|min:4|max:4',
        ]);

        $color = Color::find($id);
        $color->name = $request->name; 
        $color->color = $request->color;  
        $color->pantone = $request->pantone;  
        $color->year = $request->year;  

        $color->save();

        return response()->json(['success' => true, 'data' => $color]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        if ($this->user->role_id != 1) {
            return response()->json(['success' => false, self::NOT_SUFICIENT_PERMISIONS_MSG ]); 
        }

        $color = Color::find($id);

        return response()->json([ 'success' => true, 'data' => $color->delete()]);

    }
}
