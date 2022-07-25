<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    public function index()
    {
        return view('vacants.index');
    }

    public function create()
    {
        return view('vacants.create');
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit(Vacant $vacant)
    {
        $this->authorize('update', $vacant);
        return view('vacants.edit', compact('vacant'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
