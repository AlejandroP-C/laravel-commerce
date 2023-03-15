<div>
    <div class="card">
        <div class="card-header">

            <input type="text" wire:model="search" class="form-control"
                placeholder="Ingrese el id, nombre o precio del producto a buscar">

        </div>
        @if ($products->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>

                        <tr class="bg-dark">
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Votos totales</th>
                            <th>Puntuación media</th>
                        </tr>
                    </thead>

                    @foreach ($products as $product)
                        <tbody>

                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->title }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}&euro;</td>
                                <td class="text-center">{{ $product->total_votes }}</td>
                                @if ($product->total_votes != 0)
                                    <td class="text-center">
                                        {{ round($product->votes_valoration / $product->total_votes, 2) }}</td>
                                @else
                                    <td class="text-center">0</td>
                                @endif
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>

            <div class="card-footer">
                {{ $products->links() }}

            </div>
        @else
            <div class="card-body">
                <strong>No hay ningún registro...</strong>
            </div>
        @endif
    </div>

</div>
