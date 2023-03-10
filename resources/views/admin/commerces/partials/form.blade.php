<div class="form-group">

    {!! Form::label('name', 'Nombre') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'Ingrese el nombre del comercio']) !!}


    @error('name')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">

    {!! Form::label('slug', 'Slug') !!}
    {!! Form::text('slug', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el slug del comercio',
        'readonly',
    ]) !!}

    @error('slug')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">

    {!! Form::label('license', 'NºLicencia') !!}
    {!! Form::text('license', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese el numero de licencia del comercio',
    ]) !!}



    @error('license')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">

    {!! Form::label('location', 'Localización') !!}
    {!! Form::text('location', null, [
        'class' => 'form-control',
        'placeholder' => 'Ingrese la localización del comercio',
    ]) !!}



    @error('location')
        <small class="text-danger">{{ $message }}</small>
    @enderror

</div>

<div class="form-group">
    @foreach ($categories as $category)
        <label class="mr-2">
            {!! Form::checkbox('categories[]', $category->id, null) !!}
            {{ $category->name }}
        </label>
    @endforeach
</div>



@can('admin.commerces.edit')
    <div class="form-group">
        <p class="font-weight-bold">Validar</p>

        <label>
            {!! Form::checkbox('validate', 2) !!}
            Apto
        </label>
        
    @else
        

        @if ('validate' == 2)
            <p class="font-weight-bold">Mostrar a usuarios</p>
            <label>
                {!! Form::checkbox('status', 1) !!}
                Publicar
            </label>
        @endif
        {!! Form::hidden('validate', 1) !!}
    @endcan


    <div class="row mb-3">
        <div class="col">
            <div class="image-wrapper">
                @isset($category->image)
                    <img id="picture" src="{{ Storage::url($category->image->url) }}">
                @else
                    <img id="picture" src="https://cdn.pixabay.com/photo/2015/11/16/14/43/cat-1045782_1280.jpg"
                        alt="">
                @endisset

            </div>
        </div>
        <div class="col">
            <div class="form-group">
                {!! Form::label('file', 'Imagen que se mostrará en el comercio') !!}
                {!! Form::file('file', ['class' => 'form-control-file', 'accept' => 'image/*']) !!}

                @error('file')
                    <br>
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>


            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum ipsum, necessitatibus ratione temporibus
            veniam, distinctio nisi incidunt rerum deleniti dolor inventore earum soluta, assumenda iusto non modi ab
            rem possimus?

        </div>
    </div>
    
    <div class="form-group">
        {!! Form::label('description', 'Descripción del comercio:') !!}
        {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

        @error('description')
            <small class="text-danger">{{ $message }}</small>
        @enderror

    </div>
    @can('admin.categories.create')
    
    
    {!! Form::hidden('user_id', auth()->user()->id) !!}
    
    
    @endcan
</div>
