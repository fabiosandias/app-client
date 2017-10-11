@extends('layouts.app')

@section('content')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Olá {{ Auth::user()->name }}, seja bem-vindo!</h3>
                </div>

            </div>


        </div>
    </div>
@endsection
