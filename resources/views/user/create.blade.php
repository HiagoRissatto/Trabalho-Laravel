
@extends('layouts.default')

@section('classe-body', 'register-page bg-body-secondary')

@section('content')
    <main class="register-box">
        <h1 class="register-logo">
            <a href="{{ url('/') }}"><b>Bem-vindo</b></a>
        </h1>

        <div class="card">
            <div class="card-body register-card-body">
                <p class="register-box-msg">Preencha os campos para se registrar</p>

                <form action="{{ route('users.store') }}" method="POST">
                    @csrf

                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="error">{{ $error }}</div>
                        @endforeach
                    @endif

                    <label class="visually-hidden" for="name">Nome</label>
                    <div class="input-group mb-3">
                        <input
                            id="name"
                            name="name"
                            type="text"
                            class="form-control"
                            placeholder="Nome"
                            value="{{ old('name') }}"
                            required
                        >
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                    </div>

                    <label class="visually-hidden" for="email">Email</label>
                    <div class="input-group mb-3">
                        <input
                            id="email"
                            name="email"
                            type="email"
                            class="form-control"
                            placeholder="Email"
                            value="{{ old('email') }}"
                            required
                        >
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>

                    <label class="visually-hidden" for="password">Senha</label>
                    <div class="input-group mb-3">
                        <input
                            id="password"
                            name="password"
                            type="password"
                            class="form-control"
                            placeholder="Senha"
                            required
                        >
                        <div class="input-group-text">
                            <span class="bi bi-lock-fill"></span>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">
                                    Enviar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>

                <p class="text-center mt-3">
                    Já possui uma conta?
                    <a href="{{ route('login') }}">Entrar</a>
                </p>
            </div>
        </div>
    </main>
@endsection
