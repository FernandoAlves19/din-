@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('messages')

                <!-- Profile name card -->
                <div class="card">
                    <div class="card-header text-center">
                        <span>Meu perfil</span>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update.name', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="Input1">Nome</label>
                                <input type="text" class="form-control" id="Input1" name="name"
                                    value="{{ old('name') ?? $user->name }}">
                            </div>

                            <div class="form-group">
                                <label for="Input2">E-mail</label>
                                <input type="text" class="form-control" id="Input2" name="email"
                                    value="{{ old('email') ?? $user->email }}">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
                <br>

                <!-- Profile photo card -->
                <div class="card">
                    <div class="card-header text-center">
                        <span>Foto</span>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <form method="post" action="{{ route('profile.update.photo', $user->id) }}">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group">
                                        <label for="Input1">Imagem</label>
                                        <input type="file" class="form-control" id="Input1" name="name"
                                            value="">
                                    </div>

                                    <button type="submit" class="btn btn-primary" disabled>Salvar</button>
                                </form>
                            </div>
                            <div class="col-6">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div style="display: inline-block !important" class="avatar avatar-xl">

                                        <img style="width: 60%; height: 60%" src="./assets/compiled/jpg/1.jpg"/>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <br>

                <!-- Profile password card -->
                <div class="card">
                    <div class="card-header text-center">
                        <span>Segurança</span>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{ route('profile.update.pass', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            <div class="form-group">
                                <label for="Input2">Senha atual</label>
                                <input type="password" class="form-control" id="Input2" name="old_password">
                            </div>

                            <div class="form-group">
                                <label for="Input3">Nova senha</label>
                                <input type="password" class="form-control" id="Input3" name="new_password">
                            </div>

                            <div class="form-group">
                                <label for="Input4">Confirmação da nova senha</label>
                                <input type="password" class="form-control" id="Input4" name="password_confirm">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>

                <br>

                <!-- Family card -->
                <div class="card">
                    <div class="card-header text-center">
                        <span>Familia</span>
                    </div>

                    <div class="card-body">
                        <div class="card-header text-center">
                            <span>Cadastrar membro da Familia</span>
                        </div>
                        <form method="post" action="{{ route('cadastar.membro', $user->id) }}">
                            @csrf
                            @method('PATCH')
                            {{-- <div class="form-group">
                            <label for="Input1">Nome</label>
                            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
                        </div> --}}

                            <div class="form-group">
                                <label for="Input3">Nome da Família</label>
                                <input type="text" class="form-control" id="Input3" name="familyName"
                                    value="{{ $user->family->name }}">
                            </div>
                            <div class="form-group">
                                <label for="Input2">E-mail</label>
                                <input type="text" class="form-control" id="Input2" name="email" value="">
                            </div>

                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>

                <br>

                <div class="float-right">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Selecionar um elemento pelo seletor CSS
        const elemento = document.querySelector("#card");
        elemento.classList.remove("card");
    </script>
@endsection
