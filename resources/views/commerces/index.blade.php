<x-app-layout>

    @livewire('category-select')

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

        div.cards a:hover {
            text-decoration: none;
            box-shadow: 0px 0px 20px 23px rgba(0,0,0,0.1);
            transition: 250ms ease;
        }

    </style>

    <div class="cards">

        @foreach ($commerces as $commerce)

            <a href="{{route('commerces.show', $commerce)}}" class="bg-white shadow-xl rounded-lg overflow-hidden">

                <div class="bg-cover bg-center h-56 p-4" style="background-image: url({{Storage::url($commerce->image->url)}} )"></div>

                <div class="p-5">
                    <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $commerce->name }}</p>
                    <p class="text-gray-700 pt-2"><i class="fa-solid fa-location-dot mr-2"></i>{{ $commerce->location }}</p>
                </div>

            </a>

        @endforeach

    </div>
</x-app-layout>