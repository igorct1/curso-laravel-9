{{-- token para validação --}}
@csrf
<input class="form-control mt-2"type="text" name="name" placeholder="Nome:" value="{{ $user->name ?? old('name') }}">
<input class="form-control mt-2"type="email" name="email" placeholder="E-mail:" value="{{ $user->email ?? old('email') }}">
<input class="form-control mt-2"type="password" name="password" placeholder="Senha:">
<input class="form-control mt-2" type="file" name="image">
<button class="btn btn-outline-dark mt-2"type="submit">@yield('title')</button>