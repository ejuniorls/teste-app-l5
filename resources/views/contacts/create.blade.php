@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="container px-4 pt-2 pb-5" id="custom-cards">
            @if (isset($contact))
                <h2 class="pb-2 border-bottom">Editar contato</h2>
            @else
                <h2 class="pb-2 border-bottom">Novo contato</h2>
            @endif

            <div class="row align-items-stretch g-4 py-3 px-2">
                <div class="card ">
                    <div class="card-body">
                        <form
                            action="{{  isset($contact) ? @route('update_contact', $contact->id) : @route('store_contact') }}"
                            method="POST">
                            @csrf
                            @if (isset($contact)) {{ method_field('PUT') }} @endif

                            <div class="mb-3">
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                       name="name" aria-describedby="emailHelp"
                                       value="{{ isset($contact) ? $contact->name : old('name') }}">
                                @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                       name="email" aria-describedby="emailHelp"
                                       value="{{ isset($contact) ? $contact->email : old('email') }}">
                                @error('email')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="phone" class="form-label">Telefone</label>
                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone"
                                       name="phone" aria-describedby="emailHelp"
                                       value="{{ isset($contact) ? $contact->phone : old('phone') }}">
                                @error('phone')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="cpf" class="form-label">CPF</label>
                                <input type="text" class="form-control @error('cpf') is-invalid @enderror" id="cpf"
                                       name="cpf" aria-describedby="emailHelp"
                                       value="{{ isset($contact) ? $contact->cpf : old('cpf') }}">
                                @error('cpf')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <a href="{{ route('index_contacts') }}" class="btn btn-outline-secondary">Cancelar</a>
                            <button type="submit" class="btn btn-primary">
                                @if (isset($contact))
                                    Atualizar contato
                                @else
                                    Adicionar contato
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script>
        $(document).ready(function () {
            var SPMaskBehavior = function (val) {
                    return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
                },
                spOptions = {
                    onKeyPress: function (val, e, field, options) {
                        field.mask(SPMaskBehavior.apply({}, arguments), options);
                    }
                };

            $('#phone').mask(SPMaskBehavior, spOptions);

            $('#cpf').inputmask('999.999.999-99');

        });
    </script>

@endsection
