{{ isset($shortLinks) ? $shortLinks : $shortLinks = '' }}
<div class="p-6 sm:px-20 bg-white border-b border-gray-200">
    <form method="POST" action="{{ route('generate.shorten.link.post') }}">
        @csrf
        <div class="input-group mb-3">
          <input type="text" name="link" class="appearance-none block w-full bg-gray-100 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" placeholder="Cole aqui a URL" aria-label="Url para encurtar" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-success" type="submit">Encurtar Link</button>
          </div>
        </div>
    </form>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1">
    <div class="p-6">
        <div class="flex items-center">
            @if (Session::has('success'))
                <div class="alert alert-success">
                    <p>{{ Session::get('success') }}</p>
                </div>
            @endif

            <table class="table table-bordered table-sm" style="width:100%;">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Link curto</th>
                        <th>Link</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @livewire('show-links')
                </tbody>
            </table>
        </div>
    </div>
</div>
