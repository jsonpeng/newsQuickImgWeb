@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            He Zuo
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" style="padding-left: 20px">
                    @include('he_zuos.show_fields')
                    <a href="{!! route('heZuos.index') !!}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@endsection
