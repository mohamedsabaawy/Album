<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- overlayScrollbars -->
        <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
        <link rel="icon" href="{{asset('plugins/eg.svg')}}">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
      <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->


            <main>
                @if(session()->has('msg'))
                <div class="alert alert-default-warning text-center">
                    {{session('msg')}}
                </div>
                @endif
                {{ $slot }}
            </main>
        </div>

        @stack('modals')


        @livewireScripts


        <!-- jQuery -->
        <script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
        <!-- Bootstrap 4 -->
        <script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
{{--        <script>--}}
{{--            $(function (){--}}
{{--                var table =$().DataTable({--}}

{{--                })--}}
{{--            })--}}
{{--        </script>--}}

        <script>
            {{--  show edit album form          --}}
            function EditAlbum(album_id){

                $('#EditAlbumTitle') .text('Edit Album')
                $.ajax({
                    type : 'GET' ,
                    url : '/album/' + album_id + '/edit',
                    success : function (data){
                        $('#album_edit_form').html(data)
                    }
                })
            }
            {{--  show delete album form          --}}
            function DeleteAlbum(album_id){
                $('#EditAlbumTitle') .text('Delete Album')
                $.ajax({
                    type : 'GET' ,
                    url : '/album/' + album_id + '/delete',
                    success : function (data){
                        $('#album_edit_form').html(data)
                    }
                })
            }

            function ShowMove(){
                $('#moveToAlbum').show();
            }

            function HideMove(){
                $('#moveToAlbum').hide();
            }

            function Edit(child){
            }

                //function to set album_id
            function photoAdd(album){
                $('#album_id').val(album);
            }

            //function to show photos of an album

            function showPhoto(){
                $.ajax()
            }
        </script>


    </body>

</html>
