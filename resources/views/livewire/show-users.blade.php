<div>
    <div class="card mx-3" style="border-radius: 10px;">
        <div class="card-body p-3">
            <div class="mb-3">
                <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addUserModal">
                    <i class="fas fa-user-plus"></i> Agregar Usuario
                </button>
            </div>

            <div class="input-group mb-3">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Buscar a..."
                    wire:model="searchTerm" wire:keydown='search'>>
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
                                <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nombre</th>
                                <th class="d-none d-md-table-cell"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Correo</th>
                                <th class="d-none d-md-table-cell"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Estado</th>
                                <th class="d-none d-md-table-cell"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Teléfono
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
                                    <td class="align-middle">{{ $user->name }} {{ $user->first_last_name }}
                                        {{ $user->second_last_name }}</td>
                                    <td class="align-middle d-none d-md-table-cell">{{ $user->email }}</td>
                                    <td class="align-middle d-none d-md-table-cell">
                                        @if ($user->status)
                                            <span class="text-success">Activo</span>
                                        @else
                                            <span class="text-danger">Inactivo</span>
                                        @endif
                                    </td>
                                    <td class="align-middle d-none d-md-table-cell">{{ $user->number }}</td>
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

    <!-- Modal para Agregar Usuario -->
    <div class="modal fade" id="addUserModal" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container py-3">
                        <div class="row justify-content-center align-items-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body p-5">
                                        <div class="header mb-3">
                                            <h5 class="fw-normal mb-0">Registrar Usuario
                                                <img src="{{ asset('img/adduser.png') }}" alt="Agregar Usuario"
                                                    class="img-fluid ml-2" style="width: 80px; height: auto;">
                                            </h5>
                                        </div>
                                        <form method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="userInput" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="userInput" name="name"
                                                    required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidoInput1" class="form-label">Primer Apellido</label>
                                                <input type="text" class="form-control" id="apellidoInput1"
                                                    name="apellido1" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidoInput2" class="form-label">Segundo Apellido</label>
                                                <input type="text" class="form-control" id="apellidoInput2"
                                                    name="apellido2" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="emailInput" class="form-label">Correo Electrónico</label>
                                                <input type="email" class="form-control" id="emailInput"
                                                    name="email" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="phoneInput" class="form-label">Teléfono Celular</label>
                                                <input type="text" class="form-control" id="phoneInput"
                                                    name="phone" required minlength="10" maxlength="10"
                                                    pattern="[0-9]{10}" title="Debe contener exactamente 10 dígitos"
                                                    oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwordInput" class="form-label">Contraseña</label>
                                                <input type="password" class="form-control" id="passwordInput"
                                                    name="password" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="passwordConfirmInput" class="form-label">Confirmar
                                                    Contraseña</label>
                                                <input type="password" class="form-control" id="passwordConfirmInput"
                                                    name="password_confirmation" required>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-lg w-100">Crear
                                                Usuario</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="addUser">Agregar Usuario</button>
                </div>
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
