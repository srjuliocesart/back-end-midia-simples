<div>
    @foreach ($shortLink as $index => $s)
    <form wire:submit.prevent="save" class="w-full" method="">
	    <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="link">
                Link
            </label>
            <input wire:model="shortLink.{{ $index }}.link" class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" id="link" value="{{ $s->link }}"/>
            @if($errors->has('shortLink.{{ $index }}.link'))
                <p class="text-red-500 text-xs italic">
                    {{ $errors->first('shortLink.$index.link') }}
                </p>
            @endif
    	</div>
        <div class="w-full px-3 mb-6 md:mb-0">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="code">
                Código
            </label>
            <input wire:model="shortLink.{{ $index }}.code" class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" id="code" value="{{ $s->code }}"/>
            @if($errors->has('shortLink.{{ $index }}.code'))
                <p class="text-red-500 text-xs italic">
                    {{ $errors->first('shortLink.$index.code') }}
                </p>
            @endif
    	</div>
        <button
            class="px-3 ml-3 py-2 bg-green-400" type="submit">
            Atualizar
        </button>
    </form>
    @endforeach
</div>
