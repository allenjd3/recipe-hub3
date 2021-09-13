<header class="bg-white shadow">
  <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
    <h1 class="text-3xl font-bold text-gray-900">
        Recipe
    </h1>
  </div>
</header>
<div class="pb-12 pt-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="w-2/3 mb-16 border rounded-xl mx-auto shadow-lg relative">
                  <div class="rounded-full h-8 w-8 absolute -top-3 -right-3 z-20 bg-red-600 flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-gray-50" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                  </div>
                  <livewire:recipe-hero :title="$recipe->title"/>
                  <section class="pl-8 pt-8 pr-8 flex justify-between">
                    <livewire:index-ingredients />
                    <livewire:modify-portions />
                  </section>
                  <livewire:index-instructions />
                </div>
            </div>
        </div>
    </div>
</div>
