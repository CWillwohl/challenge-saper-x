<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBook\StorePhoneBookRequest;
use App\Http\Requests\PhoneBook\UpdatePhoneBookRequest;
use App\Models\PhoneBook;
use App\Services\PhoneBookService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class PhoneBookController extends Controller
{

    public function __construct(
        private PhoneBookService $phoneBookService,
    ) {}
    public function index() : View
    {
        $phoneBooks = PhoneBook::all();

        return view('phone-book.index', compact('phoneBooks'));
    }

    public function create() : View
    {
        return view('phone-book.create');
    }

    public function store(StorePhoneBookRequest $storePhoneBookRequest) : RedirectResponse
    {
        $data = $storePhoneBookRequest->validated();

        $phoneBook = $this->phoneBookService->create(data: $data);

        return redirect()->route('phoneBook.index');
    }

    public function show(PhoneBook $phoneBook) : View
    {
        return view('phone-book.show', compact('phoneBook'));
    }

    public function edit(PhoneBook $phoneBook) : View
    {
        return view('phone-book.edit', compact('phoneBook'));
    }

    public function update(UpdatePhoneBookRequest $updatePhoneBookRequest,
                            PhoneBook $phoneBook) : RedirectResponse
    {
        $data = $updatePhoneBookRequest->validated();

        $this->phoneBookService->update(data: $data, phoneBook: $phoneBook);

        return redirect()->route('phoneBook.index');
    }

    public function destroy(PhoneBook $phoneBook) : RedirectResponse
    {
        $this->phoneBookService->destroy(phoneBook: $phoneBook);

        return redirect()->route('phoneBook.index');
    }

}
