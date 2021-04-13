<div class="bg-white w-full rounded-2xl ml-3 mb-3 pl-8 pr-8 hover:shadow">
    @foreach($subcategorias as $item)
    <a href="/serie/{{ $item->id }}" class="grid grid-cols-3 py-4">
        <img class="place-self-start rounded-full h-12 w-12" src="/images/subcategorias/{{ $item->id }}.jpg" alt="{{ $item->name }}">
        <p class="place-self-center">{{ $item->name }}</p>
        <div class="place-self-end text-gray-600">
            <i class="fas fa-angle-right"></i>
        </div>
    </a>
    @endforeach
</div>
