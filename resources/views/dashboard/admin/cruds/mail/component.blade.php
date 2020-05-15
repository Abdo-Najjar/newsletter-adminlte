@extends('dashboard.partials.layout')

@section('title' , $title ?? "Dashboard")

@section('content')

@push('css')
<style>
    body {
        overflow: hidden;
    }

    .create-component-btn {

        text-transform: capitalize;
    }
</style>
@endpush

<div class="py-4 m-3">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{$title??"Dashboard"}}</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="invoice p-3 mb-5">


        <div id="app">

          


            <div class="text-center">



                <type-button  v-for="btn in buttons" :item="btn"></type-button>  

                                
                {{-- <button type="button" class="btn btn-primary py-2 mr-2 create-component-btn" data-toggle="modal"
                    data-target="#modal-">
                    créer @{{btn.type}}
                </button> --}}

             
            </div> 

            {{-- incldue the modals section --}}
            @include('dashboard.admin.cruds.mail.modals')

        </div>

    </div>
</div>
@endsection


@push('js')
    
<script src="{{asset('js/app.js')}}" ></script>

@endpush