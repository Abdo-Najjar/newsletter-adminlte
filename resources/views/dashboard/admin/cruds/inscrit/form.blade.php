@extends('dashboard.sheared.form')

@section('form-body')

<form  action="" method="GET" id="search-form">
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="name">Name of Newsletter</label>
                <input type="text" name="name" class="form-control " id="name" placeholder="Name">
            </div>
        </div>

        <div class="col-12">
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control " id="email" placeholder="email">
            </div>
        </div>


        <div class="col-12">
            <div class="form-group">
                <label for="dos">Date of Subscribtion</label>
                <input type="date" name="dos" class="form-control " id="dos" placeholder="Date of Subscribtion">
            </div>
        </div>
    </div>
</form>


@endsection