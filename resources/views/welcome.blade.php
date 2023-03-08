<x-app-layout>

    <style>

        div.section-title {
            margin-top: 5em;
        }

        div.cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 400px));
            justify-content: center;
            gap: 5rem;
            padding: 5rem;
            list-style-type: none;
        }

    </style>

    @isset ($category)
        <div class="section-title uppercase">
            <h2>{{ $category->name }}</h2>
        </div>
    @endisset

    <div class="cards">

        @foreach ($commerces as $commerce)

            <div class="bg-white shadow-xl rounded-lg overflow-hidden">

                <div class="bg-cover bg-center h-56 p-4" style="background-image: url(https://images.unsplash.com/photo-1475855581690-80accde3ae2b?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80)"></div>

                <div class="p-5">
                    <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $commerce->name }}</p>
                    <p class="text-gray-700 pt-2"><i class="fa-solid fa-location-dot mr-2"></i>{{ $commerce->location }}</p>
                </div>

            </div>

        @endforeach

    </div>

</x-app-layout>
