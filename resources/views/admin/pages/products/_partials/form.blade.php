@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="title">Título:</label>
    <input type="text" name="title" class="form-control" id="title" placeholder="Título:" value="{{ $product->title ?? old('title') }}">
</div>
<div class="form-group">
    <label for="image">Imagem:</label>
    <input type="file" name="image" class="form-control" id="image">
</div>
<div class="form-group">
    <label for="price">Preço:</label>
    <input type="number" name="price" class="form-control" id="price" placeholder="Preço:" value="{{ $product->price ?? old('price') }}" step="0.01">
</div>
<div class="form-group">
    <label for="description">Descrição:</label>
    <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="Descrição:">
        {{ $product->description ?? old('description') }}
    </textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>