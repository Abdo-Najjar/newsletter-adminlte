@extends('dashboard.partials.layout')

@section('title' , $title ?? "Filter")

@section('content')

{{-- @include('dashboard.admin.cruds.inscrit.form') --}}


@component('dashboard.admin.cruds.inscrit.table')
<div class="card-body">

    <div id="user-table_wrapper" class="dataTables_wrapper dt-bootstrap4">
        <div class="row">
            <div class="col-12">
                <div>
                    <form id="search_form">
                        <div class="form-row">
                            <div class="form-group col-4">
                                <label for="name">Newsletter name</label>
                                <input type="text" class="form-control" id="name" placeholder="name">
                            </div>

                            <div class="form-group col-4">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" placeholder="Email">
                            </div>


                            <div class="form-group col-4">
                                <label for="date">Date of Subscribtion</label>
                                <input type="date" name="dos" class="form-control " id="date"
                                    placeholder="Date of Subscribtion">
                            </div>
                        </div>
                    </form>

                </div>

                <table id="user-table" class="table table-bordered table-striped dataTable dtr-inline" role="grid"
                    aria-describedby="user-table_info">
                    <thead>
                        <tr role="row">
                            <th class="sorting" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="ID: activate to sort column ascending">ID</th>
                            <th class="sorting" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Name: activate to sort column ascending">Full Name</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Email: activate to sort column ascending" aria-sort="descending">
                                Email</th>
                            <th class="sorting_desc" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Newsletters: activate to sort column ascending" aria-sort="descending">
                                Newsletters</th>
                            <th class="sorting" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Created at: activate to sort column ascending">Created at</th>
                            <th class="sorting" tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Updated at: activate to sort column ascending">Updated at</th>
                            <th tabindex="0" aria-controls="user-table" rowspan="1" colspan="1"
                                aria-label="Action: activate to sort column ascending">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endcomponent

@endsection


@push('js')
<script>
    //fire when the page ready
$(document).ready(function() {

    fetchData();

    //add functinalty to name input
    $('#name').keyup(function(){

        refreshDatatable();
    });

    //add functinalty to email input
    $('#email').keyup(function() {
    
        refreshDatatable();
    });


    $('#date').change(function(){

        refreshDatatable();
    });

});





function refreshDatatable() {

    $('#user-table').DataTable().destroy();

    fetchData();
}


function fetchData(){

  $('#user-table').DataTable({
    processing: true,
    serverSide: true,
    searching:  false,
    ajax:  {
        url:'{{route('users.index')}}',
      
        data:{
        name  : $('#name').val(),
        email : $('#email').val(),
        date  : $('#date').val()
        }
    },
  
    "language": {
     "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
 },
    columns: [
        
        {data: 'id', name: 'id'},
        {data: 'full_name', name: 'full_name'},
        {data: 'email', name: 'email'},
        {data: 'newsletters', name: 'newsletters'},
        {data: 'created_at', name: 'created_at'},
        {data: 'updated_at', name: 'updated_at'},
        {data: 'action', name: 'action' , orderable: false, searchable: false}
    ]
});
}




</script>

@endpush