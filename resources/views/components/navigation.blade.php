<nav class="bg-yellow-100 px-5 py-5">
    @php
        $menus = [
            ['title' => 'Library', 'url' => '/'],
            ['title' => 'Books', 'url' => '/books'],
            ['title' => 'Categories', 'url' => '/categories'],
            ['title' => 'Members', 'url' => '/members'],
        ];
    @endphp
    <div class="flex space-x-4">
        @foreach ($menus as $menu)
            <a href="{{ $menu['url'] }}"
                class="rounded-md bg-gray-900 px-4 py-2 text-sm font-medium text-white hover:bg-gray-700 border border-gray-800 shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                {{ $menu['title'] }}
            </a>
        @endforeach
    </div>
</nav>
