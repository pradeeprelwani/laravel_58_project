<?php

namespace App\Http\Controllers\EmployeeAuth;

use App\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Employee;
use App\Repositories\EmployeeRepository;
use App\Http\Requests\EmplpoyeeProfileRequest;
class ProfileController extends Controller {

    protected $repository;

    public function __construct() {
        $this->repository = new EmployeeRepository(new Employee());
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $dataArr['profile'] = Auth::guard('employee')->user();
        return view('employee.profile.index', $dataArr);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param    employee_id
     * @return \Illuminate\Http\Response
     */
    public function update(EmplpoyeeProfileRequest $request, $employee_id) {
        try {
            $condition['id'] = $employee_id;
            $result = $this->repository->update($request->except('_token'), $condition);
            if ($result) {
                return redirect()->back()->with('success', 'Record updated');
            }
            throw new Exception("Error in reocrd updae");
        } catch (Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Role  $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role) {
        //
    }

}
