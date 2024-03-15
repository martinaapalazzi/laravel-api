<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Requests
use App\Http\Requests\Contact\StoreRequest as ContactStoreRequest;

class ContactController extends Controller
{
    public function store(ContactStoreRequest $request) {
        return response()->json($request->validated());
    }
}
