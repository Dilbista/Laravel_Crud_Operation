<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student; // Import the Student model
use App\Models\studentfee;
use App\Models\StudentProfile;
use App\Models\teacher;
use Spatie\Permission\Models\Permission;

class StudentController extends Controller
{
    /**
     * Display a listing of the students.
     */
    public function index()
    {
        // Fetch all students from the database
        $students = Student::all();
        
        // Return the view with students data
        return view('student', compact('students'));
    }
    public function create()
    {
        // dd('create');
        return view('student.create');
        // Fetch all students from the database

    }
    public function Student()
    {
        $student = student::all();
        return view('student', compact('student'));
        // Fetch all students from the database

    }
    public function fees($id)
    {
        // dd('jfnk');
        $student = Student::with('fees')->findOrFail($id);
        return view('student.fees', compact('student'));
        // Fetch all students from the database

    }
    public function pays($id)
    {
        $student = Student::findOrfail($id);
        return view('student.pay', compact('student'));
    }


    public function feesstore(Request $request)
    {
        // dd($request->all());
        $fees = new studentfee();
        $fees->student_id = $request->student_id;
        $fees->amount = $request->amount;
        $fees->date = $request->date;
        $fees->message = $request->msg;
        $fees->save();
        return redirect()->route('student.fees', $request->student_id)->with('success', 'Fee paying successfully!');
    }
    public function pay($id)
    {
        $student = Student::findOrfail($id);
        return view('student.pay', compact('student'));
    }
    public function edit(string $id)
    {
        //  dd('hello');
        // dd($id);
        $student = student::findorfail($id);
        return view('student.edite', compact('student'));
    }
    public function update(Request $request, string $id)
    {

        $request->validate([
            'name' => 'required|string|',
            'contact' => 'required|numeric|digits_between:10,15',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'


            // minimum 10 digits, max 15 (example)
        ]);
        $image = '$date->image';
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uplod/image'), $image);
        }

        // dd($id);

        $student = student::findOrFail($id);
        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->adress = $request->adress;
        $student->image = $image;
        $student->save();

        return redirect()->route('student')->with('success', 'Update Student Record Successfully!');
    }
    public function destroy(string $id)
    {

        // dd($id);
        $data = student::findorfail($id);
        $data->delete();

        return redirect()->route('student')->with('Danger', 'Delete record succeessfully!');
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|',
            'adress' => 'required|string|',
            'contact' => 'required|digits_between:10,15', 
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            // Exactly 10 digits
        ]);
        $image = '';
        if ($request->hasFile('image')) {
            $image = time() . '.' . $request->image->extension();
            $request->image->move(public_path('uplod/image'), $image);
        }
        $student = new Student();
        $student->name = $request->name;
        $student->contact = $request->contact;
        $student->adress = $request->adress;
        $student->image = $image;
        $student->save();
        return redirect()->route('student')->with('success', 'Student Added Successfully!');

        // Create a new student record


        // Redirect back to the student list with a success message
    }
    public function profile($id)
    {
        // dd($request->all());
        // Validate the incoming request
        $student = Student::findOrfail($id);
        return view('student.profile', compact('student'));
        // Redirect back to the student list with a success message
    }
    public function profileupdate(Request $request)
    {
        // dd($request->all());
        $data = new StudentProfile();
        $data->student_id = $request->student_id;
        $data->fathername = $request->father_name;
        $data->class = $request->class;
        $data->save();
        return redirect()->route('student')->with('success', "Profile Update  Successfully!");
    }



    public function assignteacher($id)
    {
        $teachers = teacher::all();
        $data = Student::with('teacher')->findOrfail($id);
        return view('student.assignteacher', compact('data', 'teachers'));
    }

    public function assignteacherstore(Request $request)
    {
        // dd($request->all());
        $student = Student::findOrFail($request->student_id);
        $student->teacher()->attach($request->teacher_id);
        return back();
    }
}
