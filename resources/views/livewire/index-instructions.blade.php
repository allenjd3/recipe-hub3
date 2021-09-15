<section class="p-8">
  <h3 class="text-xl font-bold mb-2">Instructions</h3>
  @foreach($instructions as $instruction)
  <div class="my-4">
    <p class="text-black font-bold">{{$instruction['title']}}</p>
    <p class="text-gray-600">{{$instruction['content']}}</p>
  </div>
  @endforeach
</section>
