@extends(\OEngine\Platform\Facades\Theme::Layout())
@section('content')
    <h1>Hello World</h1>

    <p>
        This view is loaded from module: {!! config('$LOWER_NAME$.name') !!}
    </p>
@endsection
