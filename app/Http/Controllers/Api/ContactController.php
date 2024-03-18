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
        $postData = $request->validated();

        //dd($postData);

        $contact = Contact::create($postData);

        return response()->json([
            'success' => true,
            'message' => 'Contact saved succefully'
        ]);
    }
}
