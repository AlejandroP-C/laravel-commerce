<x-app-layout>

    <section class="product-detail-main pt-100">

        <div class="container">

            <div class="row">

                <div class="col-lg-5 col-md-6 col-12">

                    <div class="align-center mb-md-30">

                        <div class="glass-case" style="width: 600px; height: 154px;">

                            <div class="gc-display-area" style="height: 623px; width: 700px; top: 0px; left: 0px;">

                                <div class="gc-icon gc-icon-download gc-hide" style="display: none;"></div>
                                <div class="gc-icon gc-icon-next" style="margin-top: -19.2px; display: none;"></div>
                                <div class="gc-icon gc-icon-prev" style="margin-top: -19.2px; display: none;"></div>
                                <div
                                    class="gc-display-container"style="width: 635.167px; height: 635.167px; margin-left: -50%; margin-top: -50%;">
                                    <div
                                        class="gc-lens"style="width: 540px; height: 540px; top: 34.2px; left: 0px; opacity: 0.5; display: none;">
                                    </div>
                                    @foreach ($product->images as $image)
                                        @if ($loop->first)
                                            <img class="gc-display-display" alt="product"
                                                src="{{ Storage::url($image->url) }}"
                                                style="width: 635.167px; height: 635.167px;">
                                        @endif
                                    @endforeach
                                </div>
                            </div>

                            <div class="gc-thumbs-area-main">
                                <div class="d-flex">
                                    <ul id="glasscase" class="d-flex justify-evenly"
                                        style="width: 603px; height: 86px; cursor: pointer;">
                                        @foreach ($product->images as $image)
                                            <li style="width: 15.9751%; height: 85.6625px;" class="gc-active">
                                                <div class="gc-li-display-container">
                                                    <img src="{{ Storage::url($image->url) }}" alt="product"
                                                        style="" width="97" height="97">
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-lg-7 col-md-6 col-12">

                    <div class="product-detail-in">

                        <h2 class="product-item-name text-uppercase">{{ $product->title }}</h2>

                        <div class="price-box">

                            <span class="price">{{ $product->price }}€</span>

                            <div class="rating-summary-block">

                                <form action="{{route('product.update', $product)}}" method="post" id="rating-form">
                                    @csrf
                                    @method('post')

                                    <div class="star-rating">
                                        {!! Form::radio('rating', 5, false, ['id' => 'star-5']) !!}
                                        <label for="star-5">
                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                        </label>

                                        {!! Form::radio('rating', 4, false, ['id' => 'star-4']) !!}
                                        <label for="star-4">
                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                        </label>

                                        {!! Form::radio('rating', 3, false, ['id' => 'star-3']) !!}
                                        <label for="star-3">
                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                        </label>

                                        {!! Form::radio('rating', 2, false, ['id' => 'star-2']) !!}
                                        <label for="star-2">
                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                        </label>

                                        {!! Form::radio('rating', 1, false, ['id' => 'star-1']) !!}
                                        <label for="star-1">
                                            <i class="active fa fa-star" aria-hidden="true"></i>
                                        </label>
                                    </div>
                                </form>

                            </div>

                            <div class="product-des">
                                <p>{{ $product->description }}</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {
            // Select the main image and thumbnail elements
            var mainImage = $('.gc-display-display');
            var thumbnails = $('#glasscase li');

            // Set the first thumbnail as active
            thumbnails.first().addClass('gc-active');

            // When a thumbnail is clicked, update the main image source and active thumbnail
            thumbnails.click(function() {
                var thumbnail = $(this);
                var imagePath = thumbnail.find('img').attr('src');
                mainImage.attr('src', imagePath);

                // Remove the active class from all thumbnails and add it to the clicked thumbnail
                thumbnails.removeClass('gc-active');
                thumbnail.addClass('gc-active');
            });

            $('.star-rating input').on('change', function() {
                $('#rating-form').submit();
            });
        });

    </script>

</x-app-layout>
