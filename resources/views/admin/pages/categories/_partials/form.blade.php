@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Nome:" value="{{ $category->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Descrição:">
        {{ $category->description ?? old('description') }}
    </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>