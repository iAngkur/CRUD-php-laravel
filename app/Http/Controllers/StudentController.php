<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Redirect;

class StudentController extends Controller
{
    public function student() {
        return view('students.create');
    }

    public function storeStudent(Request $request) {

        $validateData = $request->validate([
            'name' => 'required|max:25|min:3',
            'email' => 'required|unique:students',
            'phone' => 'required|unique:students|size:11'
        ]);

        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();
        
        $notification = array(
            'message' => 'Successfully Inserted',
            'alert-type' => 'success'
        );
        return Redirect()->back()->with($notification);
    }

    public function allStudents() {
        
        // $student = Student::all();
        $student = Student::latest()->get();

        return view('students.allstudents', compact('student'));
    }

}
