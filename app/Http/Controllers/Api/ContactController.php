<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

//Models
use App\Models\Contact;

// Requests
use App\Http\Requests\Contact\StoreRequest as ContactStoreRequest;

class ContactController extends Controller
{
    public function store(ContactStoreRequest $request) {

        $contact = Contact::create();

        return response()->json($request->validated());
    }
}
