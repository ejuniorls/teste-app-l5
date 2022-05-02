@extends('layouts.app')

@section('content')
    <main class="container">
        <div class="container px-4 pt-2 pb-5" id="custom-cards">
            <h2 class="pb-2 border-bottom">Funcionalidades</h2>

            <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-3">
                <div class="col">
                    <div class="card card-cover h-100 overflow-hidden text-white
                     rounded-5 shadow-lg" style="background-color: #015a8c;">
                        <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
                            <h2 class="pt-5 mt-5 mb-4 display-6 lh-1 fw-bold">Contatos</h2>
                            <a href="{{ route('index_contacts') }}" class="stretched-link"></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
@endsection
