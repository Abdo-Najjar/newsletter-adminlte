@extends('dashboard.client.partials.layout')

@section('content')


<div class="container">

    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Liste newsletters </h3>
        </div>
        <div class="card-body align-self-center mx-auto ">

            @foreach ($newsletters as $newsletter)

            <div data-newsletter_id="{{$newsletter->id}}" class="form-check mx-auto">
                <input  {{ auth()->user()->isSubscribe($newsletter->id)? 'checked':'' }}   class="form-check-input" name="newsletter_id" type="checkbox" id="newsletter{{$newsletter->id}}">
                <label class="form-check-label" for="newsletter{{$newsletter->id}}">{{$newsletter->name}}</label>
            </div>

            @endforeach

            <div class="row mt-5">
                <div class="pagination">
                    {{ $newsletters->links() }}
                </div>
            </div>
        </div>
    </div>

</div>

@endsection

@push('js')

<script>
    const csrf = "{{csrf_token()}}";
</script>

<script src="{{asset('js/client.js')}}"></script>

@endpush