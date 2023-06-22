<?php

namespace App\Http\Controllers;

use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\Contact;
use App\Models\PhoneBook;
use App\Services\ContactService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function __construct(
        private ContactService $contactService,
    ) {}

    public function index(PhoneBook $phoneBook) : View
    {
        $contacts = $phoneBook->contacts()->get();

        return view('contacts.index', compact('contacts', 'phoneBook'));
    }

    public function create(PhoneBook $phoneBook) : View
    {
        return view('contacts.create', compact('phoneBook'));
    }

    public function store(StoreContactRequest $storeContactRequest, PhoneBook $phoneBook) : RedirectResponse
    {
        $data = $storeContactRequest->validated();
        $data['phone_book_id'] = $phoneBook->id;

        $contact = $this->contactService->create(data: $data);

        return redirect()->route('contact.index', compact('contact', 'phoneBook'));
    }

    public function edit(PhoneBook $phoneBook, Contact $contact) : View
    {
        return view('contacts.edit', compact('contact', 'phoneBook'));
    }

    public function update(UpdateContactRequest $updateContactRequest, PhoneBook $phoneBook, Contact $contact) : RedirectResponse
    {
        $data = $updateContactRequest->validated();
        $data['phone_book_id'] = $phoneBook->id;

        $this->contactService->update(data: $data, contact: $contact);

        return redirect()->route('contact.index', compact('phoneBook'));
    }

    public function destroy(PhoneBook $phoneBook, Contact $contact) : RedirectResponse
    {
        $this->contactService->destroy(contact: $contact);

        return redirect()->route('contact.index', compact('phoneBook'));
    }
}
