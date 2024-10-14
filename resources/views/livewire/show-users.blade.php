<div>
    <h1 style="padding: 0 20px 20px 20px;">Tabla de usuarios</h1>

    <div class="card mx-3" style="border-radius: 10px;">
        <div class="card-body p-3">
            <div class="mb-3">
                @livewire('create-user')
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar a..."
                    wire:model="searchTerm" wire:keydown='search'>
                    
                <div>

                    <button class="btn btn-primary" type="button" disabled>
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#filterModal">
                        <i class="fas fa-filter fa-sm"></i> Filtros
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                @if ($users->count() > 0)
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Imagen</th>


                                <th class="d-none d-md-table-cell" wire:click="order('first_last_name')"
                                    style="cursor: pointer;">
                                    Nombre
                                    @if ($sort == 'first_last_name')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up"></i> <!-- Flecha que apunta hacia arriba -->
                                        @else
                                            <i class="fas fa-sort-down"></i> <!-- Flecha que apunta hacia abajo -->
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i> <!-- Flecha genérica -->
                                    @endif

                                </th>
                                <th class="d-none d-md-table-cell" wire:click="order('email')" style="cursor: pointer;">
                                    Correo 
                                    @if ($sort == 'email')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up"></i> <!-- Flecha que apunta hacia arriba -->
                                        @else
                                            <i class="fas fa-sort-down"></i> <!-- Flecha que apunta hacia abajo -->
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i> <!-- Flecha genérica -->
                                    @endif
                                </th>
                                <th class="d-none d-md-table-cell" wire:click="order('number')"
                                    style="cursor: pointer;">
                                    Teléfono 
                                    @if ($sort == 'number')
                                        @if ($direction == 'asc')
                                            <i class="fas fa-sort-up"></i> <!-- Flecha que apunta hacia arriba -->
                                        @else
                                            <i class="fas fa-sort-down"></i> <!-- Flecha que apunta hacia abajo -->
                                        @endif
                                    @else
                                        <i class="fas fa-sort"></i> <!-- Flecha genérica -->
                                    @endif
                                </th>
                                <th></th>
                                <th></th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="align-middle">
                                        @if($user->image && $user->image !== 'users/')
                                            <img src="{{ asset('storage/' . $user->image) }}" alt="Imagen" style="width: 50px; height: 50px; border-radius: 50%;">
                                        @else
                                            <img src="{{ asset('storage/StockImages/stockUser.png') }}" alt="Imagen por Defecto" style="width: 50px; height: 50px; border-radius: 50%;">
                                        @endif
                                    </td>                                   
                                    
                                    
                                    <td class="align-middle"> {{ $user->first_last_name }} {{ $user->second_last_name }}
                                        {{ $user->name }}
                                    </td>
                                    <td class="align-middle d-none d-md-table-cell">{{ $user->email }}</td>
                                    <td class="align-middle d-none d-md-table-cell">{{ $user->number }}</td>
                                    <td class="align-middle d-none d-md-table-cell">
                                        @if ($user->status)
                                            <span class="text-success">Activo</span>
                                        @else
                                            <span class="text-danger">Inactivo</span>
                                        @endif
                                    </td>

                                    <td class="align-middle"><button class="btn btn-info btn-lg"><i
                                                class="bi bi-eye"></i></button></td>
                                    <td class="align-middle"><button class="btn btn-warning btn-lg"><i
                                                class="bi bi-pencil"></i></button></td>
                                    <td class="align-middle"><button class="btn btn-danger btn-lg"><i
                                                class="bi bi-trash"></i></button></td>
                                </tr>
                            @endforeach
                            <!-- Puedes añadir más filas aquí -->
                        </tbody>
                    </table>
                @else
                    <p>No hay resultados</p>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal para la seccion de filtros-->
    <div class="modal fade" id="filterModal" tabindex="-1" role="dialog" aria-labelledby="filterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filterModalLabel">Seleccionar Filtros</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Aquí puedes añadir los campos de filtro que necesites -->
                    <div class="form-group">
                        <label for="filterStatus">Estado</label>
                        <select class="form-control" id="filterStatus">
                            <option value="">Todos</option>
                            <option value="1">Activo</option>
                            <option value="0">Inactivo</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="filterEmail">Correo</label>
                        <input type="text" class="form-control" id="filterEmail" placeholder="Correo">
                    </div>
                    <!-- Añade más campos de filtro según tus necesidades -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="applyFilters">Aplicar Filtros</button>
                </div>
            </div>
        </div>
    </div>


    

</div>
