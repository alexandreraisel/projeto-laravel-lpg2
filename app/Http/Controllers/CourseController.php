<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $courses = Course::paginate(3);

        return view('courses/index', ['courses' => $courses]);
    }


    public function create() 
    {
        return view('courses/new');
    }

    public function store(Request $request) 
    {
        $c = new Course;
        $c->name = $request->input('name');
        $c->menu = $request->input('menu');
        $c->amount = $request->input('amount');
        
        if ($c->save()) {
            \Session::flash('status', 'Curso criado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar o curso.');
            return view('courses.new');
        }
    }

    public function edit($id) {
        $c = Course::findOrFail($id);
        
        return view('courses.edit', ['course' => $c]);

    }

    public function update(Request $request, $id) {
        $c = Course::findOrFail($id);
        $c->name = $request->input('name');
        $c->menu = $request->input('menu');
        $c->amount = $request->input('amount');
        
        if ($c->save()) {
            \Session::flash('status', 'Curso atualizado com sucesso.');
            return redirect('/courses');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar o curso.');
            return view('courses.edit', ['courses' => $c]);
        }
    }

    public function destroy($id) {
        $c = Course::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Curso excluído com sucesso.');
        return redirect('/courses');
    }
}
