@extends('index.main')
@section('content')
<br>
<section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Bem-vindo</h2>
        <p>Este é seu ambiente de acesso aos contratos e metodos de pagamento da TTRX</p>
      </div>

      <div class="row">
        <div class="col-xl-6 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-layer"></i></div>
            <h4><a href="{{route('contracts')}}">Contracts</a></h4>
            <p>Clique aqui para consultar suas invoices</p>
          </div>
        </div>

        <div class="col-xl-6 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
          <div class="icon-box">
            <div class="icon"><i class="bx bx-file"></i></div>
            <h4><a href="{{route('invoices')}}">Invoices</a></h4>
            <p>Clique aqui para consultar suas invoices</p>
          </div>
        </div>
      </div>

    </div>
</section>






@endsection