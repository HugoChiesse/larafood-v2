@include('admin.includes.alerts')

@csrf
<div class="form-group">
    <label for="name">Nome:</label>
    <input type="text" name="name" class="form-control" id="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
</div>
<div class="form-group">
    <label for="email">E-mail:</label>
    <input type="email" name="email" class="form-control" id="email" step="0.01" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}">
</div>
<div class="form-group">
    <label for="password">Senha</label>
    <input type="text" name="password" id="password" class="form-control">
</div>
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>