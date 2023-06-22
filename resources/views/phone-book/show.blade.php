<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Visualizar informações da agenda') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2
        flex flex-col justify-center items-start m-8 gap-4
        bg-white">

            <div class="w-full flex p-4 bg-slate-200">
                <a href="{{ route('phoneBook.index') }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4">Visualizar lista de agendas</a>
            </div>
            <div class="w-full p-4 space-y-4">
                <hr class="w-full my-2">

                <div class="w-full flex flex-col gap-2">
                    <label for="DDD">DDD:</label>
                    <input type="text" name="DDD" id="DDD" disabled class="w-full cursor-not-allowed bg-gray-100 rounded shadow" value="{{ $phoneBook->DDD }}">
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="name">Nome da Agenda: </label>
                    <input type="text" name="name" id="name" disabled class="w-full cursor-not-allowed bg-gray-100 rounded shadow" value="{{ $phoneBook->name }}">
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="city">Cidade: </label>
                    <input type="text" name="city" id="city" disabled class="w-full cursor-not-allowed bg-gray-100 rounded shadow" value="{{ $phoneBook->city }}">
                </div>

                <hr class="w-full my-2">
            </div>

            <div class="w-full flex p-4 bg-slate-200">
                <div class="w-full flex justify-between">
                    <form action="{{ route('phoneBook.destroy', $phoneBook) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" href="{{ route('phoneBook.destroy', $phoneBook) }}" class="bg-red-500 hover:bg-red-600 duration-300 text-white p-4 uppercase">Deletar essa agenda</button>
                    </form>
                    <a href="{{ route('contact.index', $phoneBook) }}" class="bg-sky-500 hover:bg-sky-600 duration-300 text-white p-4 uppercase">Visualizar os contatos</a>
                    <a href="{{ route('phoneBook.edit', $phoneBook) }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4 uppercase">Editar essa agenda</a>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
