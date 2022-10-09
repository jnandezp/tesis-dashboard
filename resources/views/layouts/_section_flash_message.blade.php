@if(Session::has('error'))
    <div class="callout callout-danger">
        <h5>
            <i class="fas fa-exclamation-circle text-danger"></i>
            Message:
        </h5>
        {{ Session::get('message') }}
    </div>
@endif
@if(Session::has('success'))
    <div class="callout callout-success">
        <h5>
            <i class="fas fa-check-circle text-success"></i>
            Message:
        </h5>
        {{ Session::get('success') }}
    </div>
@endif
@if(session::has('message'))
    <div class="callout callout-info">
        <h5>
            <i class="fas fa-info"></i>
            Message:
        </h5>
        {{ Session::get('message') }}
    </div>
@endif
