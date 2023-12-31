<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\PhoneBook\ApiStorePhoneBookRequest;
use App\Http\Requests\Api\PhoneBook\ApiUpdatePhoneBookRequest;
use App\Models\PhoneBook;
use App\Services\PhoneBookService;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class ApiPhoneBookController extends Controller
{
    public function __construct(
        private PhoneBookService $phoneBookService
    ) {
    }

    public function index(): JsonResponse
    {
        $phoneBooks = PhoneBook::all();

        return response()->json(['phoneBooks' => $phoneBooks]);
    }

    public function store(ApiStorePhoneBookRequest $storePhoneBookRequest): JsonResponse
    {
        
        $data = $storePhoneBookRequest->validated();

        $phoneBook = $this->phoneBookService->create($data);

        return response()->json(['phoneBook' => $phoneBook], 201);
    }

    public function show(PhoneBook $phoneBook): JsonResponse
    {
        return response()->json(['phoneBook' => $phoneBook]);
    }

    public function update(ApiUpdatePhoneBookRequest $updatePhoneBookRequest, PhoneBook $phoneBook): JsonResponse
    {
        $data = $updatePhoneBookRequest->validated();

        $this->phoneBookService->update($data, $phoneBook);

        return response()->json(['message' => 'Phone book updated successfully']);
    }

    public function destroy(PhoneBook $phoneBook): JsonResponse
    {
        $this->phoneBookService->destroy($phoneBook);

        return response()->json(['message' => 'Phone book deleted successfully']);
    }
}
