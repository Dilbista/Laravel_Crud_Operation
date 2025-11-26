<?php

namespace App\Http\Controllers;
use App\Models\Teacher;
use App\Models\teacher as ModelsTeacher;
use App\Models\teacherProfile;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Teachercontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
     public function index()
    {
        // dd('mnfcnf');
        $teacher = Teacher::all();
        
        // dd($permission);
        
 return view('teacher.index',compact('teacher'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role=Role::all();
        return view('teacher.create',compact('role'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $teacher =new Teacher();
         $teacher->name=$request->name;
         $teacher->contact=$request->contact;
         $teacher->role=$request->role;
         $teacher->address=$request->address;
         $teacher->save();
         return redirect()->route('teachers.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }
    public function profile(string $id)
    {
        // dd('ff');
        $teacher=teacher::findOrFail($id);
        return view('teacher.profile',compact('teacher'));
    }
    public function profileupdate(Request $request)
    {
        // dd($request->all());
         $data = new teacherProfile();
        $data->teacher_id = $request->teacher_id;
        $data->fathername = $request->father_name;
        $data->mothername = $request->mother_name;
        $data->class = $request->class;
        $data->save();

        return redirect()->route('teachers.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
     
    
        $teacher=teacher::findorfail($id);
        return view('teacher.edit',compact('teacher'));
        // dd("hh");
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $teacher=teacher::findOrFail($id);
        $teacher->name=$request->name;
        $teacher->contact=$request->contact;
        $teacher->address=$request->address;
        $teacher->save();

        return redirect()->route('teachers.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $teacher=teacher::findOrFail($id);
        $teacher->delete();
        return redirect()->route('teachers.index');
        
    }
}
