<?php

namespace App\Http\Controllers;

use App\Events\ContactSaved;
use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactSavedMail;
use App\Services\ContactServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{

    public function __construct(private ContactServiceInterface $contactService)
    {
    }

    public function showForm(){
        return view('contact');
    }

    public function submitForm( ContactFormRequest $contactFormRequest){

        $data = $contactFormRequest->validated();

        if ($contactFormRequest->hasFile('file')) {
            $file = $contactFormRequest->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads'), $fileName);
            $data['file'] = $fileName;
        }

        $contact = $this->contactService->createContact($data);

        ContactSaved::dispatch($contact);

        return response()->json(['message' => 'Form submitted successfully'], 200);
    }
}
