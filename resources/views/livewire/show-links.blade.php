<div>
    @forelse($shortLinks as $row)
        <tr>
            <td>{{ $row->id }}</td>
            <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{ route('shorten.link', $row->code) }}</a></td>
            <td>{{ $row->link }}</td>
            <td>
                <a href="{{ route('shorten.link.edit', $row->id) }}" style="float: left;">
                    <img src="{{ asset('vendor/blade-heroicons/s-pencil-alt.svg') }}" style="height:35px;"/>
                </a>
                <a class="deleteLink" id="{{ $row->id }}"
                   style="float: left;">
                    <img src="{{ asset('vendor/blade-heroicons/s-trash.svg') }}" style="height:35px;"/>
                </a>
            </td>
        </tr>
    @empty
        <p>Não encotrou nenhum link encurtado</p>
    @endforelse
</div>
