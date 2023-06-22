<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cadastrar novo Contato') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2
        flex flex-col justify-center items-start m-8  gap-4
        bg-white">
            <div class="w-full flex p-4 bg-slate-200">
                <a href="{{ route('contact.index', $phoneBook) }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4">
                    Listar contatos
                </a>
            </div>

            <div class="w-full p-4">

                <hr class="w-full my-2">

                <form method="POST" action="{{ route('contact.store', $phoneBook) }}" class="w-full space-y-4">
                @csrf
                @method('post')

                <div class="w-full flex flex-col gap-2">
                    <label for="name">Nome do Contato: </label>
                    <input type="text" name="name" id="name" class="w-full rounded shadow" value="{{ old('name') }}">
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="cpf">CPF do Contato: </label>
                    <input type="text" name="cpf" id="cpf" class="w-full rounded shadow" value="{{ old('cpf') }}">
                    @error('cpf')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="email">E-mail do Contato: </label>
                    <input type="email" name="email" id="email" class="w-full rounded shadow" value="{{ old('email') }}">
                    @error('email')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="phone">Telefone: </label>
                    <input type="text" name="phone" id="phone" class="w-full rounded shadow" value="{{ old('phone') }}">
                    @error('phone')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="birthday">Data de Aniversario: </label>
                    <input type="date" name="birthday" id="birthday" class="w-full rounded shadow" value="{{ old('birthday') }}">
                    @error('birthday')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <hr class="w-full my-2">

            </div>

            <div class="w-full flex p-4 bg-slate-200">
                <div class="w-full flex justify-end">
                    <button class="bg-green-500 hover:bg-green-600 duration-300 text-white p-4 uppercase">Cadastrar agenda</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
