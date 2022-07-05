<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    public function showData(){
        //$showData = Crud::all();
        $showData = Crud::paginate(3);
        return view('show_data', compact('showData'));
    }

    public function addData(){
        return view('add_data');
    }

    public function storeData(Request $request){
        $rules = [
            'name'=>'required|max:10',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Name must be less than 10 char',
            //'email.required'=>'Enter your Email',
            'email.email'=>'Invalid Email',
        ];
        $this->validate($request, $rules, $cm);

        $crud = new Crud();

        //$crud->databaseField = $request->formInputField;

        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfully Added');

        //return $request->all();
        //return redirect()->back();
        return redirect('/');
    }

    public function editData($id = null){
        $editData = Crud::find($id);
        return view('edit_data', compact('editData'));
    } 

    public function updateData(Request $request,$id){
        $rules = [
            'name'=>'required|max:10',
            'email'=>'required|email',
        ];
        $cm = [
            'name.required'=>'Enter your name',
            'name.max'=>'Name must be less than 10 char',
            //'email.required'=>'Enter your Email',
            'email.email'=>'Invalid Email',
        ];
        $this->validate($request, $rules, $cm);

        $crud = Crud::find($id);

        //$crud->databaseField = $request->formInputField;

        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('msg', 'Data successfully Updated');

        //return $request->all();
        //return redirect()->back();
        return redirect('/');
    }

    public function deleteData($id=null){
        $deleteData = Crud::find($id);
        $deleteData->delete();

        Session::flash('msg', 'Data successfully Deleted');
        return redirect('/');
    }
}
