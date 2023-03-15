<div class="card">
    <div class="card-header">

        <input type="text" wire:model="search" class="form-control" placeholder="Ingrese el id del usuario, la acción o descripción a buscar...">

    </div>
    @if ($registros->count())
        <div class="card-body">





            <table class="table table-striped">
                <thead>
                    <tr class="bg-dark">
                        <th>ID</th>
                        <th>Usuario</th>
                        <th>Acción</th>
                        <th>Descripción</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($registros as $registro)
                        <tr>
                            <td>{{ $registro->id }}</td>
                            @foreach ($users as $user)
                                @if ($registro->user_id == $user->id)
                                    <td>{{ $user->name }}</td>
                                @endif
                            @endforeach
                            <td>{{ $registro->action }}</td>
                            <td>{{ $registro->description }}</td>

                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>

        <div class="card-footer">
            {{ $registros->links() }}

        </div>
    @else
        <div class="card-body">
            <strong>No hay ningún registro...</strong>
        </div>
    @endif
</div>
