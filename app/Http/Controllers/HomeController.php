<?php



namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
  public function index()
{
     $students = Student::count();
        $teachers = Teacher::count();
        $users = User::count();

        return view('welcome', compact('students','teachers','users'));
}
    public function student()
    {
        return view('student');
    }
    public function create()
    {
        return view('student.create');
    }
}
