<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lista de Agendas') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2
        flex flex-col justify-center items-center m-8 gap-4 p-4
        bg-white">

            <div class="w-full flex p-4 bg-slate-200">
                <a href="{{ route('phoneBook.create') }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4">
                    Cadastrar uma nova agênda.
                </a>
            </div>
            <table class="w-full">
                <thead class="bg-zinc-800 text-gray-100">
                    <tr>
                        <th class="border border-zinc-800 p-4">DDD</th>
                        <th class="border border-zinc-800 p-4">Nome da Agenda</th>
                        <th class="border border-zinc-800 p-4">Cidade</th>
                        <th class="border border-zinc-800 p-4">Ações</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @forelse ($phoneBooks as $phoneBook)
                        <tr>
                            <td class="border border-zinc-800">{{ $phoneBook->DDD }}</td>
                            <td class="border border-zinc-800">{{ $phoneBook->name }}</td>
                            <td class="border border-zinc-800">{{ $phoneBook->city }}</td>
                            <td class="border border-zinc-800 p-4">
                                <div class="flex flex-row justify-center items-center gap-4">
                                    <a href="{{ route('phoneBook.edit', $phoneBook) }}" type="button" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-zinc-100 p-2 rounded uppercase">Editar</a>
                                    <a href="{{ route('phoneBook.show', $phoneBook) }}" type="button" class="bg-sky-500 hover:bg-sky-600 duration-300 text-white p-2 rounded uppercase">Visualizar</a>
                                    <form action="{{ route('phoneBook.destroy', $phoneBook) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" href="{{ route('phoneBook.destroy', $phoneBook) }}" class="bg-red-500 hover:bg-red-600 duration-300 text-white p-2 rounded uppercase">Deletar</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="border border-zinc-800 p-4" colspan="5">Nenhuma agenda encontrada.</td>
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
