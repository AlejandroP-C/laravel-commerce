<div class="card">
    <div class="card-header">

        <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el nombre de tu comercio...">

    </div>
    @if ($commerces->count())
        <div class="card-body">

            {{ $commerces->links() }}

            @foreach ($commerces as $commerce)
                <div class="mb-3 form-group">
                    <h3 class="text-center"><strong>{{ $commerce->name }}</strong></h3>

                </div>
                <table class="table table-striped">
                    <thead>

                        <tr class="bg-dark">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th colspan="2"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($commerce->products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}&euro;</td>
                                <td width="10px">
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('admin.products.edit', $product) }}">Editar</a>
                                </td>
                                <td witdth="10px">
                                    <form action="{{ route('admin.products.destroy', $product) }}" method="POST">
                                        @csrf
                                        @method('delete')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach

        </div>

        <div class="card-footer">
            {{ $commerces->links() }}

        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif
</div>
