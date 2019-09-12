@extends('layouts.master')
@section('js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-6">
            <div class="card card-border-color card-border-color-primary shadow">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h4>{{ $pregunta->detalle }}</h4>
                    <span class="btn btn-danger align-self-center"><span id="time">10</span> seg</span>
                </div>
                <div class="card-body">
                    <div class="card-text">
                        <span id="valor-respuesta">&nbsp</span>
                    </div>
                    @foreach ($pregunta->respuestas as $respuesta)
                        <button type="button" class="btn-respuesta btn btn-primary btn-lg btn-block" data-elegido="false" data-respuesta="{{ $respuesta->id }}">
                            {{$respuesta->detalle}}
                        </button>
                    @endforeach

                    <form id="juego-form" action="{{ route('test.juego') }}" method="POST" style="display:none">
                        @csrf
                        <input type="hidden" name="jugador" id="jugadorId">
                        <input type="hidden" name="respuesta" id="respuestaId">

                    </form>

                </div>
                <div class="card-footer">
                    <a href="">Link</a>
                    <a href="">Link</a>
                    <a id="btn-next" class="btn btn-primary" href="">Otra</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function(){

//         Swal.fire({
//   title: 'Error!',
//   text: 'Do you want to continue',
//   type: 'error',
//   confirmButtonText: 'Cool'
// });


        var counter = 10;
        var interval = setInterval(function() {
            counter--;
            // counterText = counter;
            counterText = (counter < 10) ? ("0" + counter) : (counter);
            $('#time').text(counterText);
            // Display 'counter' wherever you want to display it.
            if (counter <= 0) {
                clearInterval(interval);

                Swal.fire({
                    title: 'Tiempo Out!',
                    text: 'Quieres continuar',
                    type: 'error',
                    confirmButtonText: 'Cool'
                });

                // $('#timer').html("<h3>Count down complete</h3>");
                jQuery(document).trigger('count_down');
                return;
            }else{
                //$('#time').text(counter);
            console.log("Timer --> " + counter);
            }
        }, 1000);

        $(document).on('count_down', function(e){
            // alert('CONTADOR EN 0');
            $('.btn-respuesta').attr('disabled', true);
        });


        $('.btn-respuesta').click(function(e){

            counter = 0;
            clearInterval(interval);

            var currentButton = $(this);
            var respuestaId = currentButton.data('respuesta');
            var jugadorId = {{ auth()->user()->jugador->id }};

            // currentButton.data({'elegido': true });
            currentButton.attr('data-elegido', true);

            $('#respuestaId').val(respuestaId);
            $('#jugadorId').val(jugadorId);
            $('#juego-form').submit();
        });






        $('#juego-form').submit(function(e){
            e.preventDefault();
            var form = $(this);
            // var url = form.attr('action');
            var url = "{{ route('test.juego') }}";

            // var dati = form.serialize();
            // console.log(dati);

            var request = $.ajax({
                type: "POST",
                url: url,
                data: form.serialize(), // serializes the form's elements.
                success: function(data)
                {
                    console.log('Completado');
                    console.log(data);
                    // alert(data); // show response from the php script.
                }
            })
            .done(function(data){
                //alert('DATA ' + data.id);
                // var boton = $('.btn-respuesta').find('[data-generated="true"]');
                // var boton = $('.btn-respuesta');
                //$('.btn-respuesta').removeClass("btn-primary").addClass("btn-danger disabled");
                //$('.btn-respuesta').removeClass("btn-primary").addClass("disabled");
                //$(".btn-respuesta[data-elegido='" + false +"']");
                //var botones = $('.btn-respuesta');
                //$('.btn-respuesta').attr('onClick', null);
                $('.btn-respuesta').attr('onclick','').unbind('click');


                data.respuestas.forEach(element => {
                    if (element.correcta) {
                        $(".btn-respuesta[data-respuesta='" + element.id +"']").removeClass("btn-primary").addClass("btn-success");//removeClass("btn-primary");
                    } else {
                        $(".btn-respuesta[data-respuesta='" + element.id +"']").addClass("disabled");//removeClass("btn-primary");
                    }
                    console.log(element);
                });

                //$(".btn-respuesta[data-elegido='" + false +"']");
                //$(".btn-respuesta[data-respuesta!='" + data.respuesta.id +"']").removeClass("btn-primary");
                //var boton = $(".btn-respuesta[data-elegido='" + true +"']");
                var boton = $(".btn-respuesta[data-elegido='" + true +"']");//.removeClass("btn-danger disabled btn-primary").addClass("btn-success");
                var boton = $(".btn-respuesta[data-elegido='" + true +"']");//.removeClass("btn-danger disabled btn-primary").addClass("btn-success");
                var botonis = $(".btn-respuesta[data-elegido='" + false +"']");//.removeClass("btn-danger disabled btn-primary").addClass("btn-success");
                //var boton = $(".btn-respuesta[data-elegido='" + true +"']");
                // $(".btn-respuesta[data-elegido='" + true +"']", function(e){
                //     var currentButton = $(this);
                //     currentButton.addClass('btn-success');
                // });
                //var boton = $(".btn-respuesta[data-elegido='" + false +"']");
                //$
                if (data.respuesta.correcta) {
                    //$('#valor-respuesta').replaceWith( '<span id="valor-respuesta">Respuesta correcta</span>' );
                    $('#valor-respuesta').text('Respuesta Correcta');
                } else {
                    // $('#valor-respuesta').replaceWith( '<span id="valor-respuesta">Respuesta incorrecta</span>' );
                    $('#valor-respuesta').text('Respuesta Incorrecta');
                }

                // var dataBoton = boton.data();
                // console.log(data.respuesta.id);
                // console.log(dataBoton.respuesta);
                // console.log(data.respuesta.id === dataBoton.respuesta);


                console.log(botonis);

            });



            // alert(url);

            // $.ajax({
            //     method: "POST",
            //     url: '/jugada',

            //     data: form.serialize(), // serializes the form's elements.
            //     success: function(data)
            //     {
            //         console.log('Completado');
            //         // alert(data); // show response from the php script.
            //     }
            // });
        });

        $('#btn-next').click(function(e){
            location.reload(true);
        });
    });

</script>

@endsection
