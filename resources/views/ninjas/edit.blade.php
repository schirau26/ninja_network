<x-layout>
    <h1>Edit Ninja</h1>

    <form action="{{ route('ninjas.update', $ninja->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input 
            type="text" 
            id="name" 
            name="name" 
            value="{{ old('name', $ninja->name) }}" 
            required
        >

        <label for="skill">Skill:</label>
        <input 
            type="number" 
            id="skill" 
            name="skill" 
            value="{{ old('skill', $ninja->skill) }}" 
            required
        >

        <label for="bio">Bio:</label>
        <textarea
            id="bio"
            name="bio"
            rows="4"
            required
        >{{ old('bio', $ninja->bio) }}</textarea>

        <label for="dojo_id">Dojo:</label>
        <select id="dojo_id" name="dojo_id" required>
            <option value="" disabled>Select a dojo</option>
            @foreach($dojos as $dojo)
                <option value="{{ $dojo->id }}" {{ old('dojo_id', $ninja->dojo_id) == $dojo->id ? 'selected' : '' }}>
                    {{ $dojo->name }}
                </option>
            @endforeach
        </select>
   
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</x-layout>