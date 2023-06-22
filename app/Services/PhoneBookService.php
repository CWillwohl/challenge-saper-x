<?php

namespace App\Services;

use App\Models\PhoneBook;

class PhoneBookService
{
    public function create(Array $data) : PhoneBook
    {
        return PhoneBook::create($data);
    }

    public function update(Array $data, PhoneBook $phoneBook) : void
    {
        $phoneBook->update($data);
    }

    public function destroy(PhoneBook $phoneBook) : void
    {
        $phoneBook->delete();
    }
}
