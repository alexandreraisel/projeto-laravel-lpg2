<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\State;

class CityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $cities = City::all();

        return view('cities/index', ['cities' => $cities]);
    }

    public function create() 
    {
        $states = State::pluck('nome', 'id');

        return view('cities/new', ['states' => $states]);
    }

    public function store(Request $request) 
    {
        $c = new City;
        $c->nome = $request->input('nome');
        $c->num_habit = $request->input('num_habit');
        $c->state_id = $request->input('states');
        
        if ($c->save()) {
            \Session::flash('status', 'Cidade criada com sucesso.');
            return redirect('/cities');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao criar a cidade.');
            return view('cities.new');
        }
    }

    public function edit($id) {
        $city = City::findOrFail($id);
        $states = State::pluck('nome', 'id');

        return view('cities.edit', ['city' => $city, 'states' => $states]);
    }

    public function update(Request $request, $id) {
        $c = City::findOrFail($id);
        $c->nome = $request->input('nome');
        $c->num_habit = $request->input('num_habit');
        $c->state_id = $request->input('states');
        
        if ($c->save()) {
            \Session::flash('status', 'Cidade atualizada com sucesso.');
            return redirect('/cities');
        } else {
            \Session::flash('status', 'Ocorreu um erro ao atualizar a cidade.');
            return view('cities.edit', ['city' => $c]);
        }
    }

    public function destroy($id) {
        $c = City::findOrFail($id);
        $c->delete();

        \Session::flash('status', 'Cidade excluída com sucesso.');
        return redirect('/cities');
    }
}
