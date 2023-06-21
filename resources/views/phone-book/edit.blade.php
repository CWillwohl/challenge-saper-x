<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Atualizar agenda') }}
        </h2>
    </x-slot>

    <div class="w-full flex justify-center">
        <div class="w-full md:w-1/2
        flex flex-col justify-center items-start m-8 gap-4
        bg-white">

            <div class="w-full flex p-4 bg-slate-200">
                <a href="{{ route('phoneBook.index') }}" class="bg-zinc-800 hover:bg-zinc-900 duration-300 text-white p-4">Visualizar lista de agendas</a>
            </div>

            <div class="w-full p-4">

                <hr class="w-full my-2">
                <form method="POST" action="{{ route('phoneBook.update', $phoneBook) }}" class="w-full space-y-4">
                @csrf
                @method('put')

                <div class="w-full flex flex-col gap-2">
                    <label for="DDD">DDD <span class="text-zinc-800 font-semibold"> (2 caracteres)</span></label>
                    <input type="text" name="DDD" id="DDD" class="w-full rounded shadow" value="{{ old('DDD') ?? $phoneBook->DDD }}">
                    @error('DDD')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="w-full rounded shadow" value="{{ old('name') ?? $phoneBook->name }}">
                    @error('name')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="w-full flex flex-col gap-2">
                    <label for="city">City</label>
                    <input type="text" name="city" id="city" class="w-full rounded shadow" value="{{ old('city') ?? $phoneBook->city }}">
                    @error('city')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <hr class="w-full my-2">

            </div>
            <div class="w-full flex p-4 bg-slate-200">
                <div class="w-full flex justify-end">
                    <button class="bg-green-500 hover:bg-green-600 duration-300 text-white p-4 uppercase">Atualizar essa agenda</button>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
