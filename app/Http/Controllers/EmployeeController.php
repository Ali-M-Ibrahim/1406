<?php

namespace App\Http\Controllers;

use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use App\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{

    use ApiResponse;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Employee::all();
        $model = EmployeeResource::collection($data);
        return $this->successResponse($model, "Employees retrieved successfully.", Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
             'title' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'salary' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

            Employee::create($request->all());
        return $this->successResponse(null,"Employee created successfully.", Response::HTTP_CREATED);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Employee::find($id);
        if(!$model){
            return $this->errorResponse("Employee not found", Response::HTTP_NOT_FOUND);
        }
        $response = new EmployeeResource($model);
        return $this->successResponse($response, Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'first_name' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->errorResponse($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        $data = Employee::find($id);
        $data->fill($request->all());
        $data->save();
        return $this->successResponse(null,"Employee updated successfully.", Response::HTTP_CREATED);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Employee::find($id);
        $data->delete();
        return $this->successResponse(null,"Employee deleted successfully.", Response::HTTP_OK);
    }
}
