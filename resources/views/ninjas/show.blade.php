<x-layout>
    <h2>Ninja name - {{ $ninja['name'] }}</h2>
        @if(session('success'))
        <div class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-200 shadow-md transition-all duration-300 animate-fade-in">
                {{ session('success') }}
        </div>
        @endif
    <div class="bg-gray-200 p-4 rounded">
        <p><strong>Skill Level:</strong> {{ $ninja->skill }}</p>
        <p><strong>About me:</strong></p>
        <p>{{ $ninja->bio }}</p>
    </div>

    <div class="border-2 border-dashed bg-white px-4 pb-4 my-4 rounded">
        <h3>Dojo Information</h3>
        <p><strong>Dojo name:</strong> {{ $ninja->dojo->name }}</p>
        <p><strong>Location:</strong> {{ $ninja->dojo->location }}</p>
        <p><strong>About the Dojo:</strong></p>
        <p>{{ $ninja->dojo->description }}</p>
    </div>

        <div>
                <form action="{{ route('ninjas.destroy', $ninja->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                </form>
                <form action="{{ route('ninjas.edit', $ninja->id) }}" method="GET" class="inline-block ml-2">
                        @csrf
                        @method('GET')
                        <button type="submit" class="btn btn-primary">Edit</button>
                </form>

                @if(session('success'))
                        <div class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 border border-green-200 shadow-md transition-all duration-300 animate-fade-in">
                            <svg class="w-5 h-5 mr-2 text-green-500 flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                            </svg>
                            {{ session('success') }}
                        </div>
                @endif
        </div>
</x-layout>
