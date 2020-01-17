@extends('layouts.app')

@section('content')

<main role="main">
   <section class="jumbotron bg text-center mb-0">
      <div class="row pt-5 bg-home">
         <div class="col-sm-12 col-md-12 col-lg-6 pt-5 text-left">

            <div class="container">
               <h5 class="title-home pt-5 ml-5">Almacena tus archivos  <br> con más eficiencia y <b>seguridad</b></h5>
               <p class="subtitle-home pt-4 ml-5">Obtén el espacio que necesitas. <br>Sube tus archivos y accede a ellos <br> desde cualquier dispositivo cuando quieras.</p>
               @guest
                  <a href="" class="btn btn-primary mt-4 ml-5">Pruébalo gratis 30 días</a>
                  <p class="mt-2 ml-5">O bien, <a href="">cómpralo ya mismo</a></p>
               @else
                  <!-- if(Auth::user()->hasRole('Suscriptor|Admin')) -->
                     <a href="" class="btn btn-danger mt-4 ml-5">Subir tus archivos</a>
                  <!-- else -->
                  <a href="{{ route('register') }}" class="btn btn-primary mt-4 ml-5">Pruébalo gratis 30 días</a>
                  <p class="mt-2 ml-5">O bien, <a href="{{ route('login') }}">cómpralo ya mismo</a></p>
                  <!-- endif -->
               @endguest

            </div>
         </div>

         <div class="col-sm-12 col-md-6 d-none d-md-none d-lg-block shadow">
            <div class="container"><img class="w-100 img-home" src="{{ asset('img/admin.png')}}">
            </div>
         </div>
      </div>
   </section>

   <div class="alert alert-light text-center alert-home mb-5" role="alert">
      Descubre todo el potencial que esta aplicación tiene para ti. Disponible 24/7.
   </div>

   {{-- @if(session('info'))
   <div class="container">
      <div class="alert alert-{{ session('info')[0] }}" role="alert">
         <span class="closebtn" onclick="this.parentElement.style.display='none';">x</span>
         <strong>¡Éxito!</strong> {{ session('info')[1] }}
      </div>
   </div>
   @endif --}}

   <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <p class="lead subtitle-home">Compara los planes y escoge el que más se adapte a lo que necesitas.</p>
   </div>

   <!-- Plans -->
   <div class="container">
      <div class="d-flex flex-row justify-content-center align-items-center">
         <div class="row mt-5 pt-2">
               @foreach($plans as $plan)
                  <div class="col-lg-4 col-md-6 text-center">
                     <div class="card mb-4">
                        <div class="card-header">
                           <h4 class="my-0 font-weight-normal">{{ $plan->plan_name }}</h4>
                        </div>

                        <div class="card-body text-left">
                           <h1 class="card-title pricing-card-title text-center">€{{ $plan->plan_price }}</h1>
                           <ul class="list-unstyled mt-3 mb-4">
                              {!! $plan->plan_description !!}
                           </ul>

                           @guest

                              <a href="{{ route('login') }}" class="btn btn-lg btn-block btn-outline-info">Ingresar</a>

                           @else
                              @can('payforthis', Auth::user())
                                 @if(Auth::user()->hasRole('Suscriptor'))
                                    <a class="btn btn-lg btn-block btn-outline-info" disabled>Ya estás suscrito</a>
                                 @else
                                 <a class="btn btn-lg btn-block btn-outline-info" data-toggle="modal" data-target="#checkoutmodal" data-price={{ $plan->plan_price }} data-planid="{{ $plan->plan_type }}">Seleccionar plan</a>
                                 @endif
                              @else
                                 <a class="btn btn-lg btn-block btn-outline-info">No puedes suscribirte</a>
                              @endcan

                           @endguest
                        </div>
                     </div>
                  </div>
               @endforeach

         </div>
      </div>
   </div>
   <!-- /Plans -->

   <!-- Features -->
   <div class="row mt-5 pt-3 mb-5">
      <div class="col-lg-4 text-center">
         <img class="img-fluid" src="{{ asset('img/features/dashboard.svg')}}" alt="Interfaz amigable" width="120">
         <h5 class="mt-5 feature-text">Interfaz amigable</h5>
      </div>

      <div class="col-lg-4 text-center">
         <img class="img-fluid" src="{{ asset('img/features/secure.svg')}}" alt="Almacenamiento seguro" width="120">
         <h5 class="mt-5 feature-text">Almacenamiento seguro</h5>
      </div>

      <div class="col-lg-4 text-center">
         <img class="img-fluid" src="{{ asset('img/features/support.svg')}}" alt="Soporte técnico" width="120">
         <h5 class="mt-5 feature-text">Soporte técnico</h5>
      </div>
   </div>
   <!-- /Features -->
</div>
</main>

<!-- Modal -->
<div class="modal fade" id="checkoutmodal" tabindex="-1" role="dialog" aria-labelledby="checkoutmodalLabel" aria-hidden="true">
   <div class="modal-dialog" role="document">
     <div class="modal-content">
       <div class="modal-header">
         <h5 class="modal-title" id="checkoutmodalLabel">Suscripción a ManageFiles</h5>
         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
         </button>
       </div>
       <div class="modal-body">
         <p id="parrafo"></p>
         <input id="card-holder-name" type="text" class="form-control mb-3" placeholder="Titular de la tarjeta">

         <!-- Stripe Elements Placeholder -->
         <div id="card-element" class="form-control" ></div>

         {{-- <input type="hidden" name="planid" id="planid" value=""> --}}
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-primary btn-lg btn-block" id="card-button" data-secret="{{ $intent->client_secret ?? 'not-exist' }}">Pagar </button>
       </div>
     </div>
   </div>
 </div>


@endsection

@section('scripts')


    {{-- @include('admin.partials.js.deleteModal') --}}
    <script>
      $('#checkoutmodal').on('show.bs.modal', function (event) {
         var btn = $(event.relatedTarget) 
         var price = btn.data('price')
         var planid = btn.data('planid')
         var modal = $(this)
         //modal.find('.modal-body #planid').val(planid);
         modal.find('.modal-footer #card-button').text('Pagar ' + price + '€');
         $("#parrafo").text('Te vas a suscribir al plan ' + planid);

         const stripe = Stripe("{{ env('STRIPE_KEY') }}");

         const elements = stripe.elements();
         const cardElement = elements.create('card');

         cardElement.mount('#card-element');

         const cardHolderName = document.getElementById('card-holder-name');
         const cardButton = document.getElementById('card-button');
         const clientSecret = cardButton.dataset.secret;

         cardButton.addEventListener('click', async (e) => {
            const { setupIntent, error } = await stripe.confirmCardSetup(
               clientSecret, {
                     payment_method: {
                        card: cardElement,
                        billing_details: { name: cardHolderName.value }
                     }
               }
            );

            if (error) {
               // Display "error.message" to the user...
               alert("Algo va a mal " + error);
               console.log('error', setupIntent.payment_method);
               
            } else {
               // The card has been verified successfully...
               console.log('handling', setupIntent.payment_method); //Es lo mismo que esto: handling pm_1G20dhK3tHzsVq0wcsvb8tQG

               // Hide modal and force close backdrop
               $('#checkoutmodal').modal('hide');
               $('.modal-backdrop').remove();         

               axios.post("{{ route('subscription.store')}}",{
                  payment_method: setupIntent.payment_method,
                  plan: planid
               });

               //alert("It works!");
               window.location = "/home";
            } //end else
         });
         
      })
   </script>

   <script src="https://js.stripe.com/v3/"></script>
   
@endsection