@extends('layouts.app')

@section('content')
    <div class="container-fluid px-0">
        <div class="row ">
            <div class="col-12 no-gutters p-0">
                <div class="jumbotron mb-0">
                    <h1 class="display-4">Тут должен быть слайдер</h1>
                    <p class="lead">This is a simple hero unit, a simple jumbotron-style component for calling extra
                        attention to featured content or information.</p>
                    <hr class="my-4">
                    <p>It uses utility classes for typography and spacing to space content out within the larger
                        container.</p>
                    <p class="lead">
                        <a class="btn btn-primary btn-lg" href="#" role="button">Learn more</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-12 no-gutters p-0 py-2">
            <div class="alert alert-primary ">
                описание для того, что у нас находится снизу :)
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 d-flex justify-content-center">ТОП ИГРОКОВ ТУТ</div>
            <div class="col-6 d-flex justify-content-center">какая то реклама</div>
            <div class="col-3 d-flex justify-content-center">Последние матчи</div>
        </div>
    </div>

@endsection
