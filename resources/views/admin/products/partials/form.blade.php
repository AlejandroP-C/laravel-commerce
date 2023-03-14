<div class="form-group">
    {!! Form::label('title', 'Nombre del producto:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del producto']) !!}
    @error('title')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div> 

<div class="form-group">
    {!! Form::label('slug', 'Slug:') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el slug del producto',
        'readonly',
    ]) !!}
    @error('slug')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Categorias</p>

    @foreach ($categories as $category)
        <label class="mr-2">
            {!! Form::checkbox('categories[]', $category->id, null) !!}
            {{ $category->name }}
        </label>
    @endforeach

    @error('categories')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="form-group">
    <p class="font-weight-bold">Comercios</p>

    @foreach ($commerces as $commerce)
        <label class="mr-2">
            {!! Form::checkbox('commerces[]', $commerce->id, null) !!}
            {{ $commerce->name }}
        </label><br>
    @endforeach

    @error('commerces')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

<div class="row mb-3">
    <div class="col">
        <div class="image-wrapper">
            @isset ($product->image)
                <img src="{{ Storage::url($product->image->url) }}" id="picture">
            @else
                <img src="https://cdn.pixabay.com/photo/2022/11/10/20/44/switzerland-7583676_960_720.jpg" alt=""
                    id="picture">
            @endisset
        </div>
    </div>

    <div class="col">
        <div class="form-group">
            {!! Form::label('file', 'Imagen de los productos') !!}
            {!! Form::file('file', ['class' => 'form-control-file mb-2', 'accept' => 'image/*', 'multiple']) !!}
           
        </div>

        @error('file')
            <br>
            <small class="text-danger">{{ $message }}</small>
        @enderror

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nam repudiandae necessitatibus fugiat
            quisquam minus ex labore dicta tempore tenetur qui porro repellendus ducimus voluptate provident,
            repellat asperiores deleniti at odit.</p>
    </div>
</div>

<div class="form-group">
    {!! Form::label('description', 'Descripción del producto:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">
    {!! Form::label('price', 'Precio del producto:') !!}
    {!! Form::text('price', null, ['class' => 'form-control']) !!}


    @error('price')
        <br>
        <small class="text-danger">{{ $message }}</small>
    @enderror
</div>

