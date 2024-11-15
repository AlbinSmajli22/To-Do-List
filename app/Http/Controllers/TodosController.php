<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use App\Http\Requests\StoretodosRequest;
use App\Http\Requests\UpdatetodosRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $todos = Todos::where('user_id', Auth::id())->latest()->paginate(10);
        //$users = User::all();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoretodosRequest $request)
    {
        $this->authorize('create', Todos::class);
  


        $validated = $request->validate([
            'titulli' => 'required|string|max:255',
            'pershkrimi' => 'required|string|max:255',
            'statusi' => 'required|boolean',
        ]);
    
        // Create a new Todo item, setting the user_id to the current user
        $todo = new Todos();
        $todo->titulli = $validated['titulli'];
        $todo->pershkrimi = $validated['pershkrimi'];
        $todo->statusi = $validated['statusi'];
        $todo->user_id = Auth::id(); // Set the current user's ID
    
        $todo->save();

        return redirect()->back()->with(['msg'=>'tasku u shtua me sukses!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Todos $todos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTodosRequest $request, $id)
    {
        Todos::makeUpdate($request,$id);
        return redirect()->back()->with(['msg'=>'tasku u perditesua me suskes!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($todo)
    {
        $todo = Todos::findOrFail($todo);
        $todo->delete();
        return redirect()->back()->with(['msg'=>'Tasku u fshi me sukses!']);
    }
}
