@csrf
<input type="text" name="name" id="name" placeholder="Digite o nome" value="{{$users->name?? old('name')}}">
<input type="email" name="email" id="email" placeholder="Digite o email" value="{{$users->email ?? old('email')}}">
<input type="password" name="password" id="password" placeholder="Digite a senha">
<button type="submit">Salvar</button>