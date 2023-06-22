<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreContactRequest;
use App\Http\Requests\Contact\UpdateContactRequest;
use App\Models\PhoneBook;
use App\Services\ContactService;
use Illuminate\Http\JsonResponse;

class ApiContactController extends Controller
{
    public function __construct(
        private ContactService $contactService
    ) {}

    public function index(PhoneBook $phoneBook): JsonResponse
    {
        $contacts = $phoneBook->contacts()->get();

        return response()->json(['contacts' => $contacts, 'phoneBook' => $phoneBook]);
    }

    public function store(StoreContactRequest $storeContactRequest, PhoneBook $phoneBook): JsonResponse
    {
        $data = $storeContactRequest->validated();
        $data['phone_book_id'] = $phoneBook->id;

        $contact = $this->contactService->create($data);

        return response()->json(['contact' => $contact], 201);
    }

    public function update(UpdateContactRequest $updateContactRequest, PhoneBook $phoneBook, Contact $contact): JsonResponse
    {
        $data = $updateContactRequest->validated();
        $data['phone_book_id'] = $phoneBook->id;

        $this->contactService->update($data, $contact);

        return response()->json(['message' => 'Contact updated successfully']);
    }

    public function destroy(PhoneBook $phoneBook, Contact $contact): JsonResponse
    {
        $this->contactService->destroy($contact);

        return response()->json(['message' => 'Contact deleted successfully']);
    }
}
