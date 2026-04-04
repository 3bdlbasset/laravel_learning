<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;

class EmployeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employes = Employe::all();
        return view('employe.index' , compact('employes'));
    }

    public function index2()
    {

        if(request('search1')){
            $employes = Employe::where('nom' , 'like' , '%' . request('search1') . '%')->get();
        }
        else{
            $employes = Employe::all();
        };
        return view('employe.carte' , compact('employes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employe.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'salaire' => 'required|numeric'
        ]);

        Employe::create($validated);
        return redirect()->route('employes.index')->with('success' , 'Employe ajoute! ');

    }

    /**
     * Display the specified resource.
     */
    public function show(Employe $employe)
    {
        return view('employe.show' , compact('employe'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $employe = Employe::findOrFail($id);
        return view('employe.edit' , compact("employe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'salaire' => 'required|numeric'
        ]);

        $employe = Employe::findOrFail($id);
        $employe->update($validated);

       
        return redirect()->route('employes.index')->with('success' , 'Employe modifie !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employe $employe)
    {   
        $employe -> delete();
        return redirect()->route('employes.index')->with('success', 'Employé supprimé !');
    }
}
