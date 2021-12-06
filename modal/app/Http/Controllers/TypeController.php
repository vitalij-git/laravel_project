<?php

namespace App\Http\Controllers;

use App\Type;
use Illuminate\Http\Request;
use Validator;
use App\Article;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $types= Type::all();
      return view('type.index', ['types'=>$types]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function edit(Type $type)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Type  $type
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        //
    }
   public function storeAjax(Request $request) {


        $type = new Type;

        $input = [
            'typeTitle' => $request->typeTitle,
            'typeDescription' => $request->typeDescription,
        ];
        $rules = [
            'typeTitle' => 'required|min:3',
            'typeDescription' => 'min:5',
        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $type->title = $request->typeTitle;
            $type->description = $request->typeDescription;

            $type->save();

            $success = [
                'success' => 'type added successfully',
                'typeId' => $type->id,
                'typeTitle' => $type->title,
                'typeDescription' => $type->description,
            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $errors = [
            'error' => $validator->messages()->get('*')
        ];

        $errors_json = response()->json($errors);

        return $errors_json;

    }
    public function editAjax(Type $type) {
        $success = [
            'success' => 'type recieved successfully',
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    public function updateAjax(Request $request, type $type) {
        $input = [
            'typeTitle' => $request->typeTitle,
            'typeDescription' => $request->typeDescription,
        ];
        $rules = [
            'typeTitle' => 'required|min:3',
            'typeDescription' => 'min:5',
        ];

        $validator = Validator::make($input, $rules);

        if($validator->passes()) {
            $type->title = $request->typeTitle;
            $type->description = $request->typeDescription;

            $type->save();

            $success = [
                'success' => 'type update successfully',
                'typeId' => $type->id,
                'typeTitle' => $type->title,
                'typeDescription' => $type->description,
            ];

            $success_json = response()->json($success);

            return $success_json;
        }

        $errors = [
            'error' => $validator->messages()->get('*')
        ];

        $errors_json = response()->json($errors);

        return $errors_json;

    }
    public function showAjax(type $type) {

        $success = [
            'success' => 'type recieved successfully',
            'typeId' => $type->id,
            'typeTitle' => $type->title,
            'typeDescription' => $type->description,
        ];

        $success_json = response()->json($success);

        return $success_json;
    }
    public function searchAjax(Request $request) {

        $searchValue = $request->searchField;
        $types = Type::query()
            ->where('title', 'like', "%{$searchValue}%")
            ->orWhere('description', 'like', "%{$searchValue}%")
            ->get();

        if($searchValue == '' || count($types)!= 0) {

            $success = [
                'success' => 'Found '.count($types),
                'types' => $types
            ];

            $success_json = response()->json($success);


            return $success_json;
        }

        $error = [
            'error' => 'No results are found'
        ];

        $errors_json = response()->json($error);

        return $errors_json;

    }
    public function filterAjax(Request $request) {

            $types = Type::all();


        $types_count = count($types);

        if ($types_count == 0) {
            $error = [
                'error' => 'There are no types',
            ];

            $error_json = response()->json($error);
            return $error_json;
        }

        $success = [
            'success' => 'types filtered successfuly',
            'types' => $types
        ];

        $success_json = response()->json($success);

        return $success_json;



    }
    public function indexAjax(Request $request) {

        $sortCol = $request->sortCol;
        $sortOrder = $request->sortOrder;

        if($sortCol && $sortOrder ){
            $types = Type::orderBy($sortCol, $sortOrder)->get();

            $types_count = count($types);

            if ($types_count == 0) {
                $error = [
                    'error' => 'There are no types',
                ];

                $error_json = response()->json($error);
                return $error_json;
            }
            $success = [
                'success' => 'types sorted successfuly',
                'types' => $types
            ];

            $success_json = response()->json($success);

            return $success_json;

        }
        else{
            $types=Type::all();
            return view('type.index', ['types'=>$types]);
        }




    }
}
