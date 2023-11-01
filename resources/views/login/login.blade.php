@extends('index.main')
@section('content')
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <div class="col-md-5"></div>
      <div class="col-md-3">
        <h1 class="logo me-auto"><a href="#">Zift Customer</a></h1>
      </div>
      <div class="col-md-2"></div>
      <div class="col-md-2"></div>
    </div>
</header>
  <br><br>
<br>

<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Coloque suas credenciais</h2>
        </div>

        <div class="row">
            <div class="col-lg-12 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form id="form_login" class="php-email-form">
                <div class="row">
                <div class="form-group col-md-3"></div>
                <div class="form-group col-md-6">
                    <label for="name">E-mail Corporativo</label>
                    <input type="text" name="user" class="form-control" id="email" required>
                </div>
                </div>

                <div class="row">
                
                    <div class="form-group col-md-3"></div>
                    <div class="form-group col-md-6">
                        <label for="name">Senha</label>
                        <input type="password" name="pass" class="form-control" id="senha" required>
                    </div>
                    </div>
                    {{-- <div class="my-3">
                    <div class="loading">Carregando</div>
                    <div class="error-message"></div>
                    </div> --}}

                    <div class="text-center btn-sm"><a href="esqueci.php">Esqueci minha senha</a></div><br>
                    <div class="text-center"><button name="save">Enviar</button></div>
                </div>
            </form>
            </div>
        </div>
    </div>
</section>
@include('index.footer')

@push('scripts')
<script>
    $('[name="save"]').on('click', function(){
            try{
                $.ajax({
                    url:'{{route('login_validate')}}',
                    data: $('#form_login').serialize(),
                    method: 'post',
                    assync: false,
                    success: function(returned){
                        window.location = '{{route('index')}}';
                    },
                    error: function(error, jhrx){
                        
                        Swal.fire('Error! ' + error.responseText, '', 'error')
                        // Swal.fire('Error! Something went wrong, please try again.', '', 'error')
                        console.log(error, jhrx);
                    }
                });
            }catch(e){
                Swal.fire('Error! ' + e, '', 'error')
            }
        });
</script>
@endpush








@endsection