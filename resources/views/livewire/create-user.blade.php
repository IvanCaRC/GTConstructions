 <div>
     <button class="btn btn-primary" type="button" wire:click="$set('open', true)">
         <i class="fas fa-user-plus"></i> Agregar Usuario
     </button>

     <div>
        @if ($open)
        <div id="addUserModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="addUserModalLabel" aria-hidden="true" style="display: block;">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="fw-normal mb-0">Registrar Usuario
                            <img src="{{ asset('img/adduser.png') }}" alt="Agregar Usuario" class="img-fluid ml-2" style="width: 30px; height: auto;">
                        </h5>
                    </div>
                    <div class="modal-body">
                        <div class="modal-body">
                            <div class="container py-3">
                                <div class="row justify-content-center align-items-center">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body p-5">
                                                <div class="header mb-3"></div>
                                                <form method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="mb-3 d-flex align-items-center">
                                                        @if ($image)
                                                            <img src="{{ $image->temporaryUrl() }}" alt="Imagen" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                                        @else
                                                            <img src="{{ asset('storage/StockImages/stockUser.png') }}" alt="Imagen por Defecto" style="width: 50px; height: 50px; border-radius: 50%; margin-right: 10px;">
                                                        @endif
                                                        <label class="btn btn-primary btn-file">
                                                            Elegir archivo <input type="file" id="imageInput" name="image" wire:model="image" hidden>
                                                        </label>
                                                    </div>
                                                    
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
                                                    <div class="row mb-3">
                                                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                                                            <label for="emailInput" class="form-label">Correo Electrónico</label>
                                                            <input type="email" class="form-control" id="emailInput" name="email" wire:model.defer="email" required>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <label for="phoneInput" class="form-label">Teléfono Celular</label>
                                                            <input type="text" class="form-control" id="phoneInput" name="phone" wire:model.defer="number" minlength="10" maxlength="10" pattern="[0-9]{10}" title="Debe contener exactamente 10 dígitos" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0,10);">
                                                        </div>
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
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" wire:click="$set('open', false);">Cerrar</button>
                        <button type="button" class="btn btn-primary" id="addUser" onclick="handleButtonClick()" wire:loading.attr="disabled" wire:target="save">Agregar Usuario</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-backdrop fade show"></div>
    @endif
    
     </div>


     <script>
         function handleButtonClick() {
             // Llamar al método save del componente Livewire
             @this.save();

             // Cerrar el modal
             @this.set('open', false);
         }
     </script>



 </div>
<div>
    <!-- Botón Agregar Usuario -->
    
    
</div>
