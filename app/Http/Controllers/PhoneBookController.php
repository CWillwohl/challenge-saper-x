<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhoneBook\StorePhoneBookRequest;
use App\Http\Requests\PhoneBook\UpdatePhoneBookRequest;
use App\Models\PhoneBook;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PhoneBookController extends Controller
{
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

        $phoneBook = PhoneBook::create($data);

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

        $phoneBook->update($data);

        return redirect()->route('phoneBook.index');
    }

    public function destroy(PhoneBook $phoneBook) : RedirectResponse
    {
        $phoneBook->delete();

        return redirect()->route('phoneBook.index');
    }

}
