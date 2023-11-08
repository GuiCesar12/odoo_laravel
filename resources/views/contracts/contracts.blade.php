@extends('index.main')
@section('content')
<section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-10 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                <div class="content">
                    <h3>Eum ipsam laborum deleniti <strong>velit pariatur architecto aut nihil</strong></h3>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
                    </p>
                </div>
                <div class="accordion-list">
                    <ul>
                        <li>
                        <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span> Contracts <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
                            <p>
                                <table id="contracts" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Name:</th>
                                            <th>Type:</th>
                                            <th>End Date:</th>
                                            <th>Start Date:</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                </table>
                            </p>
                        </div>
                        </li>
                        <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span> Payment Modules <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-sm-6">
                                          <div class="card">
                                            <div class="card-body">
                                              <h5 class="card-title">Special title treatment</h5>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="col-sm-6">
                                          <div class="card">
                                            <div class="card-body">
                                              <h5 class="card-title">Special title treatment</h5>
                                              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                                              <a href="#" class="btn btn-primary">Go somewhere</a>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                </div>
                            </p>
                        </div>
                        </li>
                        <li>
                        <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span> Dolor sit amet consectetur adipiscing elit? <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
                            <p>
                            Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                            </p>
                        </div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-1 align-items-stretch" data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>
    </div>
</section>






@endsection
@push('scripts')
<script>
function get_payments(){
    try{
            $.ajax({
                url:'{{route('selectContracts')}}',
                method: 'get',
                assync: false,
                success:function(returned){
                    console.log(returned[0]["nome_cartao"])
                },
                error:function(error, jhrx){
                    console.log(error, jhrx);
                }
            });
        }catch(e){
            Swal.fire('Error! ' + e, '', 'error')
        }
}



tableContracts = null
    function updateTable(){
        try{
            $.ajax({
                url:'{{route('selectContracts')}}',
                method: 'get',
                assync: false,
                success:function(returned){
                tableContracts.clear().rows.add(returned).draw();
                },
                error:function(error, jhrx){
                    console.log(error, jhrx);
                }
            });
        }catch(e){
            Swal.fire('Error! ' + e, '', 'error')
        }
    }
$(document).ready(function() {
    tableContracts = $('#contracts').DataTable({
        scrollX: true,
        responsive: true,
        
        columns:[{
            data:'name'
        },{
            data:'contract_type'
        },{
            data:'date_end'
        },{
            data:'date_start'
        }],
        columnDefs:[{
        target:4,
        render:function(data){
            return `<button type="button" class="btn btn-primary "id="modal" data-toggle="modal" data-target="#exampleModalLong">Details</button>`;
        }
        }]
    });
    updateTable()
        get_payments()
});   


</script>
@endpush