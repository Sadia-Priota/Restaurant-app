<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Resto;
use App\Models\teacherTable;
use Illuminate\Http\Request;

class teacherController extends Controller
{
    public function index()

    {
//        $search_string = $request->search_string;
//        $data = teacherTable::query()
//            ->when($search_string, function ($query) use($search_string){
//                $query->where('name','like',"%{$search_string}%")
//                    ->orWhere('course','like',"%{$search_string}%");
//            })
//            ->orderBy('id','desc')
//            ->paginate(5);
//
//
//
//
//        return view('teacher.index',compact('data'));




       // $teachers= teacherTable::all();
//        dd($data);
        $teachers= teacherTable::query()->paginate(5);
        return view('teacher.index',compact('teachers'));

    }

    //store info
        public function addTeacher(Request $req)
        {
//            $validation_date = validator(request()->all(),[
//                'name'  => ['required'],
//                'course'  => ['required','string'],
//                'institute'  => ['required'],
//            ])->validate();
//
//            $data['name'] = $validation_date['name'];
//            $data['course'] = $validation_date['course'];
//            $data['institute'] = $validation_date['institute'];


           // $req->session()->flash('status','Adding successfully');
//            return $req->input();

            $req->validate(
                [
                'name'  => 'required|unique:teacher_tables',
                'course'  => 'required','string',
                'institute'  => 'required',
                ],

            );

            $teacher= new teacherTable();
            $teacher->name = $req->name;
            $teacher->course = $req->course;
            $teacher->institute = $req->institute;
            $teacher->save();

            return response()-> json([
                'status' => 'success',
            ]);
        }


        //update info

    public function updateTeacher(Request $req)
    {

//        return $req;
        $req->validate(
            [
                'up_name'  => 'required|unique:teacher_tables,id,' . $req->up_id,
                'up_course'  => 'required','string',
                'up_institute'  => 'required',
            ],

        );

       teacherTable::where('id', $req->up_id)->update([
           'name'=> $req->up_name,
           'course'=> $req->up_course,
           'institute'=> $req->up_institute,
       ]);



        return response()-> json([
            'status' => 'success',
        ]);
    }

    public function deleteTeacher(Request $req){

        $info = teacherTable::find($req->id);
        $info -> delete();

        return response()-> json([
            'status' => 'success',
        ]);
    }

    public function confirmDeleteTeacher(Request $req){



//        teacherTable::find($req->id)->delete();

        return response()-> json([
            'status' => 'success',
        ]);
    }

    public function searchTeacher(Request $req){

        $search_string=$req->search_string;

        $teachers = teacherTable::query()
            ->where('name','like',"%{$search_string}%")
            ->orWhere('course','like',"%{$search_string}%")
            ->orderBy('id','desc')
            ->paginate(5);

        if($teachers->count() >= 1){
            return view('teacher.teacher-ajax', compact('teachers'))->render();
        }
        else{
            return response() -> json([
                'status' => 'nothing_found',
            ]);
        }
    }
}
