<x-app-layout>

    <style>

        div.section-title {
            margin-top: 5em;
        }

        div.cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 400px));
            justify-content: center;
            list-style-type: none;
        }

    </style>

    <div class="cards">

        <div class="bg-white shadow-xl rounded-lg overflow-hidden">

            <div class="bg-cover bg-center h-56 p-4"
                style="background-image: url( {{ Storage::url($commerce->image->url) }} )">
            </div>

            <div class="p-5">
                <p class="uppercase tracking-wide text-sm font-bold text-gray-700">{{ $commerce->name }}</p>
                <p class="text-gray-700 pt-2"><i class="fa-solid fa-location-dot mr-2"></i>{{ $commerce->location }}</p>
            </div>

        </div>

    </div>

    <section class="product-list">

        <div class="container">

            <div class="row pt-100">

                <div class="col-xl-11 col-lg-6 col-md-6">
                    <div class="hading">
                        <h2 class="hading-title"><span>Productos</span></h2>
                    </div>
                </div>

                <div class="col-xl-2 col-lg-4 col-12"></div>

                <div class="col-xl-9 col-lg-8 col-12">

                    <div class="featured">

                        <div class="row">

                            @if (count($products) == 0)

                                <div class="no-products">
                                    Lo sentimos, actualmente este comercio no tiene productos a la venta.
                                </div>
                            @else

                                @foreach ($products as $product)

                                    <div class="featured-product featured-product-list align-flax mb-25">

                                        <div class="product-img transition">

                                            @foreach ($product->images as $image)
                                                @if ($loop->first)
                                                    <a href="{{route('products.detail', $product)}}">
                                                        <img class="transition" src="{{ Storage::url($image->url) }}"
                                                            alt="{{ $image->alt_text }}">
                                                    </a>
                                                @endif
                                            @endforeach

                                        </div>

                                        <div class="product-desc">
                                            <a href="{{route('products.detail', $product)}}"
                                                class="product-name text-uppercase">{{ $product->title }}</a>
                                            <span class="product-pricce">{{ $product->price }}€</span>
                                            <p class="product-detail-desc">{{ $product->description }}</p>
                                        </div>

                                    </div>
                                @endforeach

                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</x-app-layout>
