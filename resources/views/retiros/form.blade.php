<div class="row">
        <div class="col-md-6">
            <label for="Nombre" class="form-label">Nombre:</label>
            <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ isset($personas->Nombre)?$personas->Nombre:old('Nombre') }}">
        </div>
        <div class="col-md-6">
            <label for="Primer_Apellido" class="form-label">Primer Apellido:</label><br>
            <input type="text" class="form-control" name="Primer_Apellido" id="Primer_Apellido" placeholder="Introduzca primer apellido" value="{{ isset($personas->Primer_Apellido)?$personas->Primer_Apellido:old('Primer_Apellido')  }}">
        </div>