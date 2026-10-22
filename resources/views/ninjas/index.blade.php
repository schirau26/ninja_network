<x-layout>
    <h2>Currently Available Ninjas</h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <ul>
        @foreach ($ninjas as $ninja)
        <li>
            <x-card :ninja="$ninja->id" :highlight="$ninja['skill'] > 70">
       
            <div>
                <h3>{{ $ninja->name }}</h3>
                <p>{{$ninja->dojo->name}}
            </div>
            </x-card>
        </li>
        @endforeach
    </ul>

    {{$ninjas->links()}}
</x-layout>
