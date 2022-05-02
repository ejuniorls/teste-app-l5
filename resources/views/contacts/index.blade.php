@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="container px-4 pt-2 pb-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Contatos</h2>

            @auth
                <div class="d-flex align-items-end justify-content-end py-2">
                    <a href="{{ route('create_contact') }}" class="btn btn-primary">Novo contato</a>
                </div>
            @endauth
            @guest
                <div class="alert alert-warning my-4" role="alert">
                    Para criar, editar ou excluir um contato. Efetue o
                    <a href="{{ route('login') }}" class="alert-link">login</a>.
                </div>
            @endguest

            @if (isset($contactInfo['mensagem']))
                <x-alert :message="$contactInfo['mensagem']" :class="$contactInfo['alert']"></x-alert>
            @endif

            <div class="row align-items-stretch g-4 py-2 px-2">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">NOME</th>
                                    <th scope="col">E-MAIL</th>
                                    <th scope="col">TELEFONE</th>
                                    <th scope="col">CPF</th>
                                    @auth
                                        <th scope="col">AÇÕES</th>
                                    @endauth
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($contacts as $contact)
                                    <tr>
                                        <th scope="row">{{ $contact->id }}</th>
                                        <td>{{ $contact->name }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->phone }}</td>
                                        <td>{{ $contact->cpf }}</td>
                                        <td>
                                            @auth
                                                <div class="dropdown">
                                                    <button
                                                        class="btn btn-secondary btn-sm dropdown-toggle"
                                                        type="button"
                                                        id="dropdownMenuButton1"
                                                        data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        Ações
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end"
                                                        aria-labelledby="dropdownMenuButton1">
                                                        <li>
                                                            <a class="dropdown-item"
                                                               href="{{ route('edit_contact', $contact->id) }}">Editar</a>
                                                        </li>
                                                        <li>
                                                            <form method="post"
                                                                  action="{{ route('delete_contact', $contact->id) }}"
                                                                  onsubmit="return confirm('Tem certeza?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button class="dropdown-item">
                                                                    Excluir
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            @endauth
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>



    <script>
        $(function () {
            $('#table').bootstrapTable()
        })
    </script>

@endsection
