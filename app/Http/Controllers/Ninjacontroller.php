<?php

namespace App\Http\Controllers;
use App\Models\Ninja;
use App\Models\Dojo;

use Illuminate\Http\Request;

class Ninjacontroller extends Controller
{
    public function index(){
    //route --> /ninjas/
    // fetch all records & pass into the index view

    // $ninjas = Ninja::orderBy("created_at" , "desc")->get();
    $ninjas = Ninja::with("dojo")->orderBy("created_at" , "desc")->paginate(10);
    return view('ninjas.index',["ninjas"=>$ninjas]);

    }

    public function show(Ninja $ninja){
    // route --> /ninjas/{id}
    // fetch a single record & pass into show view 
    $ninja->load("dojo");
    return view('ninjas.show',["ninja"=> $ninja]);

    }

    public function create(){
    //route --> /ninjas/create
    //render a create view (with web form)

    // fetch record with id

    $dojos = Dojo::all();

    return view('ninjas.create' , ["dojos" => $dojos]);
    }

    public function store(Request $request){
    // route --> POST /ninjas
    // handle the create form, validate the data, and save a new ninja
    $validated = $request->validate([
        "name" => "required|string|max:255",
        "skill" => "required|integer|min:0|max:100",
        "bio" => "required|string|min:20|max:1000",
        "dojo_id" => "required|integer|exists:dojos,id",
    ]);

    $ninja = Ninja::create($validated);

    return redirect()->route('ninjas.show', $ninja->id)->with('success', 'Ninja created successfully');
    }

    public function edit(Ninja $ninja){
    // route --> /ninjas/{id}/edit
    // fetch a single record and pass it into the edit view (with web form)
    $dojos = Dojo::all();
    return view('ninjas.edit', ["ninja" => $ninja, "dojos" => $dojos]);
    }

    public function update(Request $request, Ninja $ninja){
    // route --> PUT/PATCH /ninjas/{id}
    // handle the edit form, validate the data, and update an existing ninja
    $validated = $request->validate([
        "name" => "required|string|max:255",
        "skill" => "required|integer|min:0|max:100",
        "bio" => "required|string|min:20|max:1000",
        "dojo_id" => "required|integer|exists:dojos,id",
    ]);
    $ninja->update($validated);
    return redirect()->route('ninjas.show', $ninja->id)->with('success', 'Ninja updated successfully');
    }

    public function destroy(Ninja $ninja){
    // route --> DELETE /ninjas/{id}
    // delete a single ninja record
    $ninja->delete();
    return redirect()->route('ninjas.index')->with('success', 'Ninja deleted successfully');
    }
}
