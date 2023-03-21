<div class="card">



    <div class="card-header">
        <input wire:model="search" class="form-control" placeholder="Ingrese el nombre del comercio">
    </div>


    @if ($commerces->count())






        <div class="card-body">
            <table class="table table-stripe">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Licencia</th>
                        <th>Ubicación</th>
                        <th>Encargado</th>
                        <th colspan="2"></th>
                    </tr>
                </thead>

                <tbody>
                    @can('admin.commerces.index')
                        @foreach ($commerces as $commerce)
                            <tr>
                                <td>{{ $commerce->id }}</td>
                                <td>{{ $commerce->name }}</td>
                                <td>{{ $commerce->license }}</td>
                                <td>{{ $commerce->location }}</td>
                                @foreach ($users as $user)
                                    @if ($user->id == $commerce->user_id)
                                        <td>{{ $user->name }}</td>
                                    @endif
                                @endforeach
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.commerces.edit', $commerce) }}">Editar</a>
                                </td>
                                <td with="10px">
                                    <form action="{{ route('admin.commerces.destroy', $commerce) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        @foreach ($commerces2 as $commerce)
                            <tr>
                                <td>{{ $commerce->id }}</td>
                                <td>{{ $commerce->name }}</td>
                                <td>{{ $commerce->license }}</td>
                                <td>{{ $commerce->location }}</td>
                                @foreach ($users as $user)
                                    @if ($user->id == $commerce->user_id)
                                        <td>{{ $user->name }}</td>
                                    @endif
                                @endforeach
                                <td>
                                    <a class="btn btn-success btn-sm"
                                        href="{{ route('admin.products.index') }}">Administrar
                                        Productos</a>
                                </td>
                                <td with="10px">
                                    <a class="btn btn-primary btn-sm"
                                        href="{{ route('admin.commerces.edit', $commerce) }}">Editar</a>
                                </td>

                                <td with="10px">
                                    <form action="{{ route('admin.commerces.destroy', $commerce) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    @endcan



                </tbody>

            </table>
        </div>
        @can('admin.commerces.edit')
            <div class="card-footer">
                {{ $commerces->links('pagination::bootstrap-4') }}
            </div>
        @endcan
    @else
        <div class="card-body">
            <strong>No hay ningun registro ...</strong>
        </div>

    @endif
</div>
