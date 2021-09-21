@php 
$ingredientStep = 1;

@endphp
<div>
  <h3 class="text-xl font-bold mb-2">Ingredients</h3>
  @foreach($ingredients as $ingredient)
    <p>{{$ingredientStep++}}. {{$ingredient['amount']}} {{$ingredient['type']}} of {{$ingredient['name']}}</p>
  @endforeach
  
  <form wire:submit.prevent="createIngredient">
    <div>
      <label for="amount">How Much?</label>
      <input type="text" id="amount" wire:model="amount">
    </div>
    <div>
      <label for="unit">Units of Measure</label>
      <input type="text" id="unit" wire:model="type">
    </div>
    <div>
      <label for="name">Ingredient Name</label>
      <input type="text" id="name" wire:model="name">
    </div>
    <div>
      <button type="submit">Create Ingredient</button>
    </div>
  </form>
</div>
