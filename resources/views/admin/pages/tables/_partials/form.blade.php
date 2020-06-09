@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="identify">Identificação:</label>
    <input type="text" name="identify" class="form-control" id="identify" placeholder="Nome:" value="{{ $table->identify ?? old('identify') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <input type="text" name="description" class="form-control" id="description" placeholder="Nome:" value="{{ $table->description ?? old('description') }}">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>