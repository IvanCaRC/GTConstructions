<div>
  <div class="card mx-3" style="border-radius: 10px;">
    <div class="card-body p-3">
      <div class="input-group mb-3">
        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" wire:model="search">
        <div class="input-group-append">
          <button class="btn btn-primary" type="button" disabled>
            <i class="fas fa-search fa-sm"></i>
          </button>
        </div>
      </div>
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Imagen</th>
              <th style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Nombre</th>
              <th class="d-none d-md-table-cell" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Correo</th>
              <th class="d-none d-md-table-cell" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Estado</th>
              <th class="d-none d-md-table-cell" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">Teléfono</th>
              <th></th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            @foreach ($users as $user)
            <tr>
              <td class="align-middle"><img src="https://via.placeholder.com/50" alt="Imagen" style="width: 50px; height: 50px; border-radius: 50%;"></td>
              <td class="align-middle">{{ $user->name }} {{ $user->first_last_name }} {{ $user->second_last_name }}</td>
              <td class="align-middle d-none d-md-table-cell">{{ $user->email }}</td>
              <td class="align-middle d-none d-md-table-cell">
                @if ($user->status)
                  <span class="text-success">Activo</span>
                @else
                  <span class="text-danger">Inactivo</span>
                @endif
              </td>
              <td class="align-middle d-none d-md-table-cell">{{ $user->number }}</td>
              <td class="align-middle"><button class="btn btn-info btn-lg"><i class="bi bi-eye"></i></button></td>
              <td class="align-middle"><button class="btn btn-warning btn-lg"><i class="bi bi-pencil"></i></button></td>
              <td class="align-middle"><button class="btn btn-danger btn-lg"><i class="bi bi-trash"></i></button></td>
            </tr>
            @endforeach
            <!-- Puedes añadir más filas aquí -->
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
  

</div>
