<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Komoditi;
 
class KomoditiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $komoditi = Komoditi::orderBy('created_at', 'DESC')->get();
  
        return view('komoditis.index', compact('komoditi'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('komoditis.create');
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Komoditi::create($request->all());
 
        return redirect()->route('komoditis')->with('success', 'Komoditas added successfully');
    }
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $komoditi = Komoditi::findOrFail($id);
  
        return view('komoditis.show', compact('komoditi'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $komoditi = Komoditi::findOrFail($id);
  
        return view('komoditis.edit', compact('komoditi'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $komoditi = Komoditi::findOrFail($id);
  
        $komoditi->update($request->all());
  
        return redirect()->route('komoditis')->with('success', 'Komoditas updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $komoditi = Komoditi::findOrFail($id);
  
        $komoditi->delete();
  
        return redirect()->route('komoditis')->with('success', 'Komoditas deleted successfully');
    }
}