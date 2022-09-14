<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class PeopleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $peoples = People::all();

        if (strlen($peoples) <= 2) {
            return response()->json(['reponse' => 'Unable to find records!'], 404);
        }

        return $peoples;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* Validando os parâmetros */
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'age' => 'required',
            'address' => 'required',
            'address.*.country' => 'required',
            'address.*.state' => 'required',
            'address.*.city' => 'required',
            'email' => 'required|unique:people',
        ], [
            'required' => 'The \':attribute\' is a mandatory parameter and must be specified!',
            'unique' => 'The \':attribute\' is already registered, try another one!',
        ]);

        /* Verificando se existem erros */
        if ($validator->fails()) {
            $error = [
                'error' => $validator->errors()->first(),
            ];

            return response()->json($error, 203);
        }

        /* Criando usuário se não existirem erros */
        People::create($request->all());
        return response()->json(['reponse' => 'created'], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $people = People::find($id);

        if (strlen($people) <= 2) {
            return response()->json(['reponse' => 'Unable to find records!'], 404);
        }
        
        return $people;
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
    }
}
