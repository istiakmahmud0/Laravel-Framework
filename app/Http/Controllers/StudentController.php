<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use function Ramsey\Uuid\v1;
use App\Student;

//Model ORM is used Here

class StudentController extends Controller
{
    public function student(){
        return view('student.create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => 'required|max:30',
            'phone' => 'required|unique:students|max:12|min:9',
            'email' => 'required|unique:students',
        ]);
//       $student = new Student;
        $category = Student::create($request->all());

        if($category){
            $notifications = array(
                'message'=>'Succesfully Students Info inserted',
                'alert-type'=>'success'
            );
            return redirect()->back()->with($notifications);
        }
        else{
            $notifications = array(
                'message'=>'error',
                'alert-type'=>'error',
            );
            return redirect()->back()->with($notifications);
        }
    }
    public function allStudent(){
        $student = Student::all();

        return view('student.allstudent',compact('student'));

    }
    public function viewStudent($id){
        $student = Student::findorfail($id);
        return view('student.viewstudent',compact('student'));
    }

    public function deleteStudent($id){
        $student=Student::where('id',$id)->delete();
        return redirect()->back();
    }

    public function editStudent($id){
        $student = Student::findorfail($id);
        return view('student.editstudent',compact('student'));
    }
    public function updateStudent($id,Request $request){
        $student = Student::findorfail($id);

        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->save();


        return redirect('all/student');
    }

}
