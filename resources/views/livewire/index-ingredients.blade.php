@php 
$ingredientStep = 1;

@endphp
<div>
  <h3 class="text-xl font-bold mb-2">Ingredients</h3>
  @foreach($ingredients as $ingredient)
    <p>{{$ingredientStep++}}. {{$ingredient['amount']}} {{$ingredient['type']}} of {{$ingredient['name']}}</p>
  @endforeach
</div>
