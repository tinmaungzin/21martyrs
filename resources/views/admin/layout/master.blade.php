<!DOCTYPE html>
<html lang="en">

<head>
    <title>21 Martyrs - @yield('title')</title>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=yes">

    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href=" {{ asset('css/ui.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/selectboot.css') }} ">
    <link rel="stylesheet" type="text/css" href=" {{ asset('css/style.css') }} ">
    <link rel="stylesheet" href=" {{ asset('fontawesome/css/all.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/datepicker.min.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/yearpicker.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/timepicki.css') }} ">
    <link rel="stylesheet" href=" {{ asset('css/MonthPicker.min.css') }} ">

    <script src=" {{ asset('js/bootstrap.popper.min.js') }} "></script>
    <script src=" {{ asset('js/jquery.js') }} "></script>
    <script src=" {{ asset('js/jquery-ui.min.js') }} "></script>
    <script src=" {{ asset('js/bootstrap.js') }} "></script>
    <script src=" {{ asset('js/bs.js') }} "></script>
    <script src=" {{ asset('js/MonthPicker.min.js') }} "></script>
    <script src=" {{ asset('js/datepicker.min.js') }} "></script>
    <script src=" {{ asset('js/yearpicker.js') }} "></script>
    <script src=" {{ asset('js/vue.js') }} "></script>
    <script src=" {{ asset('js/sorting.js') }} "></script>
    <script src=" {{ asset('js/jquery.autosize.js') }} "></script>


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script defer src="{{ asset('js/app.js') }}"></script>

    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.js">
    </script> --}}

</head>

<body style="background-color: #eff1f5">
    <div id="app" class="overall-container">
        @include('admin.layout.sidebar')
        @yield('content')
    </div>



    <script type="application/javascript">
        $(document).ready(function (){
            $('.normal').autosize();
            $('.animated-txtarea').autosize();

            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tbody tr").filter(function() {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            $('.selectpicker').selectpicker('refresh');
            $('#monthpicker').MonthPicker({ Button: false });
            $(".yearpicker").yearpicker({
                // autohide:true,
                // initialYear:null,
                onShow:null,
                year:null,
                startYear: 1990,
                endYear: 2030,
                pick:null,
                show:null,

            });
        });



    </script>
</body>

</html>
