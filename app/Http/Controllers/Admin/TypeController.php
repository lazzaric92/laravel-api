<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $types = Type::paginate(15);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Type $type)
    {
        $type = new Type();
        return view('admin.types.create', compact('type'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|min:2|max:50|unique:types',
            'color' => 'required|string|hex_color'
        ]);
        $type = Type::create($data);
        return redirect()->route('admin.types.show', compact('type'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        // dd($type->id);
        $projectsList = Project::where('type_id', $type->id)->orderBy('date', 'desc')->paginate(20);
        return view('admin.types.show', compact('type', 'projectsList'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        $data = $request->validate([
            'name' => ['required','string','min:2','max:50', Rule::unique('types')->ignore($type->id)],
            'color' => 'required|string|hex_color'
        ]);
        $type->update($data);
        return redirect()->route('admin.types.show', compact('type'))->with('message', $type->name . ' updated succesfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->route('admin.types.index')->with('message', 'A type has been deleted');
    }
}
