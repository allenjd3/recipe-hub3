@php 
$ingredientStep = 1;

@endphp
<div x-data="{showCreateIngredient : @entangle('showCreateIngredient'), showButton : @entangle('showButton'), showEditIngredient: @entangle('showEditIngredient')}">
  <h3 class="text-xl font-bold mb-2">Ingredients</h3>
  @foreach($ingredients as $ingredient)
    <p>{{$ingredientStep++}}. <span x-on:click="showEditIngredient = true; $wire.setIngredient('{{json_encode( $ingredient )}}')">{{$ingredient['amount']}} {{$ingredient['type']}} of {{$ingredient['name']}}</span></p>
  @endforeach
  
  <div x-show="showButton" class="text-gray-600">
    <a href="#" x-on:click.prevent="showCreateIngredient = true; showButton = false">
    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
    </svg>
  </a>
  </div>
  <div x-show="showCreateIngredient">
  <form wire:submit.prevent="createIngredient">
    <div class="my-2">
      <label for="amount">How Much?</label>
      <input type="text" id="amount" wire:model="amount" class="w-full">
    </div>
    <div class="my-2">
      <label for="unit">Units of Measure</label>
      <input type="text" id="unit" wire:model="type" class="w-full">
    </div>
    <div class="my-2">
      <label for="name">Ingredient Name</label>
      <input type="text" id="name" wire:model="name" class="w-full">
    </div>
    <div class="my-2 flex justify-between">
      <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-50 rounded-lg">Create Ingredient</button>
      <button x-on:click.prevent="showCreateIngredient = false; showButton = true" type="button" class="px-4 py-2 bg-white text-gray-600 hover:text-gray-800">Cancel</button>
    </div>
  </form>
</div>
  <div x-show="showEditIngredient">
  <form wire:submit.prevent="updateIngredient()">
    <div class="my-2">
      <label for="amount">How Much?</label>
      <input type="text" id="amount" wire:model="amount" class="w-full">
    </div>
    <div class="my-2">
      <label for="unit">Units of Measure</label>
      <input type="text" id="unit" wire:model="type" class="w-full">
    </div>
    <div class="my-2">
      <label for="name">Ingredient Name</label>
      <input type="text" id="name" wire:model="name" class="w-full">
    </div>
    <div class="my-2 flex justify-between">
      <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-50 rounded-lg">Create Ingredient</button>
      <button x-on:click.prevent="showCreateIngredient = false; showButton = true" type="button" class="px-4 py-2 bg-white text-gray-600 hover:text-gray-800">Cancel</button>
    </div>
  </form>
</div>
</div>
