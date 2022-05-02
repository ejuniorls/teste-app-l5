@extends('layouts.app')

@section('content')
    <div class="container col-xxl-8 px-4 py-5">
        <div class="row flex-lg-row-reverse align-items-center g-5 py-5">
            <div class="col-10 col-sm-8 col-lg-6">
                <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_960_720.jpg"
                     class="d-block mx-lg-auto img-fluid" alt="mulher digitando no computador"
                     loading="lazy" width="700" height="500">
            </div>
            <div class="col-lg-6">
                <h1 class="display-5 fw-bold lh-1 mb-3">Teste L5 - CRUD de contatos</h1>
                <p class="lead">Mussum Ipsum, cacilds vidis litro abertis. Delegadis gente finis, bibendum egestas augue
                    arcu ut est.Si num tem leite então bota uma pinga aí cumpadi!Leite de capivaris, leite de mula
                    manquis sem cabeça.Manduma pindureta quium dia nois paga.</p>
                <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                    <a href="{{ route('index_contacts') }}" class="btn btn-primary btn-lg px-4 me-md-2" tabindex="-1" role="button" aria-disabled="true">Visualizar contatos</a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4" tabindex="-1" role="button" aria-disabled="true">Acessar conta</a>

                </div>
            </div>
        </div>
    </div>
@endsection
