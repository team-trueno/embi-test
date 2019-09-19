@extends('layouts.master')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col">
            <div class="jumbotron jumbotron-fluid">
                <h1 class="display-4">Fluid jumbotron</h1>
                <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            </div>
        </div>
    </div>

</div> --}}
<div class="container-fluid mb-4">
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner rounded-lg">
          <div class="carousel-item active">
            <img class="d-block w-100" src="https://via.placeholder.com/1440x480.png" alt="First slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/1440x480.png" alt="Second slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="https://via.placeholder.com/1440x480.png" alt="Third slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    </div>


        <div class="flex-center position-ref full-height">
                <section id="top" class="first">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <img class="img-fluid" src="{{ asset('storage/rueda_icono.png') }}" alt="BirritApp">
                                </div>
                                <div class="col">
                                    <div class="row">
                                        <img class="img-fluid" src="{{ asset('storage/logo_embirrados.png') }}" alt="BirritApp">
                                        <p>Comienza a jugar hoy mismo, no podrás parar de jugar.</p>
                                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis culpa velit repellendus
                                            corporis, omnis ratione natus molestias aliquid autem enim in. Expedita, nisi? Dolor,
                                            tempore eos veniam unde id magni.</p>
                                    </div>
                                    <div class="row">
                                        <p><a class="btn btn-warning btn-lg" href="#" role="button"><i class="fas fa-dice-d20"></i>
                                                Empieza a jugar ahora &raquo;</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- SECTION: CONTACTO -->
                    <section id="contacto" class="first">
                        <div class="container">
                            <h2>Contactate con nosotros</h2>
                            <form>
                                <label for="inputNombre" class="sr-only">Nombre</label>
                                <input type="text" id="inputEmail" class="form-control mb-3" placeholder="Nombre completo" required
                                    >

                                <label for="inputEmail" class="sr-only">Correo electrónico</label>
                                <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Correo electrónico" required>

                                <label for="inputAsunto" class="sr-only">Asunto</label>
                                <input type="text" id="inputAsunto" class="form-control mb-3" placeholder="Asunto" required>

                                <label for="inputMensaje" class="sr-only">Mensaje</label>
                                <textarea name="mensaje" class="form-control mb-3" id="inputMensaje" cols="30" rows="5"
                                    placeholder="Escribe tu mensaje aquí..." required></textarea>

                                <br>
                                <button class="btn btn-warning btn-lg" type="submit">Enviar</button>

                            </form>
                            <br>
                    </section>
@endsection
                    <!-- Footer -->
                {{-- @section('footer')


                        <div class="container">
                            <div class="row">
                                <div class="col-md-4">
                                    <h3>Contacto</h3>
                                    <ul class="list-unstyled">
                                        <li><i class="fa fa-map-marker-alt"></i> Av. Trueno 1234, 2000 Rosario</li>
                                        <li><i class="fab fa-whatsapp"></i> +54 9 341 323-0962</li>
                                        <li><i class="fa fa-envelope"></i><a href="mailto:contacto@teamtrueno.com">
                                                contacto@teamtrueno.com</a></li>
                                    </ul>
                                </div>
                                <div class="col-md-4">
                                    <p>Desarrollado por TeamTrueno</p>
                                </div>
                                <div class="col-md-4">
                                    <h3>Seguinos en</h3>
                                    <span class="red"><i class="fab fa-facebook-f"></i></span>
                                    <span class="red"><i class="fab fa-instagram"></i></span>
                                    <span class="red"><i class="fab fa-linkedin"></i></span>
                                    <span class="red"><i class="fab fa-twitter"></i> teamtrueno</span>
                                </div>
                            </div>
                        </div>
                        @endsection --}}


