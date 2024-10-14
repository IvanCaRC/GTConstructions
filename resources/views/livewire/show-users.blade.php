<div>
    
    <h1 style="padding: 0 20px 20px 20px;">Tabla de usuarios</h1>

    <div class="card mx-3" style="border-radius: 10px;">
        <div class="card-body p-3">
            

            <div class="input-group mb-3">
                <button class="btn btn-primary" type="button" wire:click="showModal">
                    <i class="fas fa-user-plus"></i> Agregar Usuario
                </button>
            
                <!-- Modal -->
                @if ($open)
                <div class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50">
                    <div class="bg-white shadow-lg rounded-lg p-6 w-full max-w-md mx-auto z-60">
                        <div class="modal-header">
                            <h5 class="fw-normal mb-0">Registrar Usuario
                                <img src="{{ asset('img/adduser.png') }}" alt="Agregar Usuario" class="img-fluid ml-2" style="width: 30px; height: auto;">
                            </h5>
                        </div>
                        <div class="modal-body">
                            <form method="POST">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                                        <label for="userInput" class="form-label">Nombre</label>
                                        <input type="text" class="form-control" id="userInput" name="name" wire:model.defer="name" required>
                                    </div>
                                    <div class="col-12 col-md-4 mb-3 mb-md-0">
                                        <label for="apellidoInput1" class="form-label">Primer Apellido</label>
                                        <input type="text" class="form-control" id="apellidoInput1" name="apellido1" wire:model.defer="first_last_name" required>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <label for="apellidoInput2" class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="apellidoInput2" name="apellido2" wire:model.defer="second_last_name" required>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="emailInput" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="emailInput" name="email" wire:model.defer="email" required>
                                </div>
                                <div class="mb-3">
                                    <label for="phoneInput" class="form-label">Teléfono Celular</label>
                                    <input type="text" class="form-control" id="phoneInput" name="phone" wire:model.defer="number" number minlength="10" maxlength="10" pattern="[0-9]{10}" title="Debe contener exactamente 10 dígitos" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                                </div>
                                <div class="mb-3">
                                    <label for="statusInput" class="form-label">Estado</label>
                                    <select class="form-control" id="statusInput" name="status" wire:model.defer="status" required>
                                        <option value="1">Activo</option>
                                        <option value="0">Inactivo</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordInput" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="passwordInput" name="password" wire:model.defer="password" required>
                                </div>
                                <div class="mb-3">
                                    <label for="passwordConfirmInput" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="passwordConfirmInput" name="password_confirmation" required>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" wire:click="$set('open', false)">Cerrar</button>
                            <button type="button" class="btn btn-primary" id="addUser" wire:click="save" wire:loading.attr="disabled" wire:target="save">Agregar Usuario</button>
                        </div>
                    </div>
                </div>
                @endif
            
                <!-- Barra de búsqueda -->
                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar a..." wire:model="searchTerm" wire:keydown='search'>
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
                                    <td class="align-middle"><img src="https://via.placeholder.com/50" alt="Imagen"
                                            style="width: 50px; height: 50px; border-radius: 50%;"></td>
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
