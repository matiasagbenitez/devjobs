<?php

namespace App\Http\Controllers;

use App\Models\Vacant;
use Illuminate\Http\Request;

class VacantController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Vacant::class);
        return view('vacants.index');
    }

    public function create()
    {
        $this->authorize('create', Vacant::class);
        return view('vacants.create');
    }


    public function show(Vacant $vacant)
    {
        return view('vacants.show', compact('vacant'));
    }

    public function edit(Vacant $vacant)
    {
        $this->authorize('update', $vacant);
        return view('vacants.edit', compact('vacant'));
    }

}
