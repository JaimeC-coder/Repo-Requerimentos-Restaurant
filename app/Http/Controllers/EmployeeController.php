<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;

/**
 * Class EmployeeController
 * @package App\Http\Controllers
 */
class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate();

        return view('employee.index', compact('employees'))
            ->with('i', (request()->input('page', 1) - 1) * $employees->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();

        return view('employee.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //return $request->all();
        request()->validate(
            Employee::$rules
        );

        DB::transaction(function () use ($request) {
            $NewUser = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' =>Crypt::encrypt($request->password),

            ])->assignRole($request->roles);
            $NewUser->employee()->create([
                'DNI' => $request->DNI,
                'phone' => $request->phone,
                'address' =>  $request->address,
                'city' => $request->city,
            ]);
        });
        return redirect()->route('employees.index')
            ->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);

        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employees = Employee::find($id);

        
        $roles = Role::pluck('name', 'id');
        return view('employee.edit', compact('employees', 'roles'));
    }

    public function getUser($id)
    {
        //devuelve el usuario con el id que le pasamos pero con el id del employee

        $user = User::find($id);
        //Desencriptamos la contraseña encriptada con hash
        $user->password = Crypt::decrypt($user->password);





        return response()->json($user);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        request()->validate(Employee::$rules);

        DB::transaction(
            function () use ($request, $employee) {
                $employee->update($request->all());
                $employee->user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Crypt::encrypt($request->password),
                ]);
                $employee->user->syncRoles($request->roles);
            }
        );



        return redirect()->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $employee = Employee::find($id)->delete();

        return redirect()->route('employees.index')
            ->with('success', 'Employee deleted successfully');
    }
}
