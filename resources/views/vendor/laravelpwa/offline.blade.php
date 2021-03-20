@extends('layout.app')

@section('content')

    <p class="text-center">You are currently not connected to any networks.</p>
    <div class="text-center">
        <button type="button" onclick="onReload()" class="btn btn-primary">
            Reconnect
        </button>
    </div>
    <script type="text/javascript">
        function onReload() {
            window.location.href = "/";
        }
        window.addEventListener('online', () => {
            window.location.href = "/";
        })

    </script>
@endsection
