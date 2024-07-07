<?php

namespace App\Http\Controllers;

use App\Http\Requests\Tributes\StoreRequest;
use App\Models\Tribute;

class TributeController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $site = Tribute::create($data);

        return response(resource($site), 201);
    }
}
