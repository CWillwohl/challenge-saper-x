<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Contatos') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2
        flex flex-col justify-center items-center m-8 gap-4 p-4
        bg-white">

            <div class="w-full flex p-4 bg-slate-200">
                <a href="{{ route('contact.create', $phoneBook) }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4">
                    Cadastrar um novo contato
                </a>
            </div>
            <table class="w-full">
                <thead class="bg-zinc-800 text-gray-100">
                    <tr>
                        <th class="border border-zinc-800 p-4">Telefone</th>
                        <th class="border border-zinc-800 p-4">Nome</th>
                        <th class="border border-zinc-800 p-4">Telefone</th>
                        <th class="border border-zinc-800 p-4">Data de Aniversário</th>
                        <th class="border border-zinc-800 p-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($contacts as $contact)
                        <tr>
                            <td class="border border-zinc-800">{{ $contact->phone }}</td>
                            <td class="border border-zinc-800">{{ $contact->name }}</td>
                            <td class="border border-zinc-800">{{ $contact->email }}</td>
                            <td class="border border-zinc-800">{{ $contact->birthday }}</td>
                            <td class="border border-zinc-800 p-4">
                                <div class="flex flex-row justify-center items-center gap-4">
                                    <a href="{{ route('contact.edit', [$phoneBook, $contact]) }}" type="button" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-zinc-100 p-2 rounded uppercase">
                                        Editar
                                    </a>
                                    <form action="{{ route('contact.destroy', [$phoneBook, $contact]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" href="{{ route('contact.destroy', [$phoneBook, $contact]) }}" class="bg-red-500 hover:bg-red-600 duration-300 text-white p-2 rounded uppercase">
                                            Deletar
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border border-zinc-800 p-4" colspan="5">Nenhum contato encontrado.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{-- <div class="w-full flex flex-col">
                {{ $contacts->links() }}
            </div> --}}

        </div>
    </div>


</x-app-layout>
