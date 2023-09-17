<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Desa;
 
class DesaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $desa = Desa::orderBy('created_at', 'DESC')->get();
  
        return view('desas.index', compact('desa'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('desas.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Desa::create($request->all());
 
        return redirect()->route('desas')->with('success', 'Desa added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $desa = Desa::findOrFail($id);
  
        return view('desas.show', compact('desa'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $desa = Desa::findOrFail($id);
  
        return view('desas.edit', compact('desa'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $desa = Desa::findOrFail($id);
  
        $desa->update($request->all());
  
        return redirect()->route('desas')->with('success', 'Desa updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $desa = Desa::findOrFail($id);
  
        $desa->delete();
  
        return redirect()->route('desas')->with('success', 'Desa deleted successfully');
    }
}