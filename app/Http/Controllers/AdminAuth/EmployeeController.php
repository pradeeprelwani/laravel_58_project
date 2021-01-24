<?php

namespace App\Http\Controllers\AdminAuth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Employee;
use App\Repositories\EmployeeRepository;
use Yajra\DataTables\DataTables;
class EmployeeController extends Controller
{
    protected $employee;
    public function __construct() {
        $this->employee=  new EmployeeRepository(new Employee());
    }
    public function index(Request $request){
         if ($request->ajax()) {
            $data = $this->employee->getEmployeeListrole();
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('status', function($row){
                           if($row['is_active']==1){
                               $status= 0;
                               $label= 'Active';
                           }else{
                               $status= 1;
                               $label= 'In active';
                           }
                           return '<a href="' . route('admin.employees.change_status',[$row->id,$status]) .'">'.$label.'</a>'; 
                    })
                    ->addColumn('action', function($row){
                           $btn = '<a href="javascript:void(0)" class="edit btn btn-primary btn-sm">View</a>';
                           return $btn;
                    })
                    ->addColumn('role', function($row){
                            return $row->role->name??"";
                    })
                    ->rawColumns(['action','role','status'])
                    ->make(true);
        }
     return view('admin.employees.index');   
    }
    
    public function changeStatus(Request $request, $emp_id, $status){
        try{
        $isStatusChange=$this->employee->update(['is_active'=>$status], ['id'=>$emp_id]);
        if($isStatusChange){
            return redirect()->back()->with('success',"Status changed successfully");
        }
        throw new Exception("Error in status change");
        }catch(Exception $e){
            return redirect()->back()->with('error',$e->getMessage());
        }
    }
}
