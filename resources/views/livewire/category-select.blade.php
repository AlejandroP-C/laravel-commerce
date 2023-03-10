<div>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Categorías</span>
                        </div>
                        <ul style="display: none">
                            @foreach ($categories as $category)
                                <li><a href="{{route('commerces.category', $category)}}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
