@extends('index.main')
@section('content')
@include('invoices.modal')
<br>
<br>
<section id="faq" class="faq section-bg" >
    <div class="container" data-aos="fade-up">
        <div class="section-title">
        <h2>Invoices</h2>
        </div>
        <div class="col-lg-1 mt-1 mt-lg-0" data-aos="fade-up" data-aos-delay="200"></div>
        <div class="col-lg-10 mt-10 mt-lg-0" data-aos="fade-up" data-aos-delay="200">
            <table id="invoices" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Id:</th>
                        <th>Status:</th>
                        <th>Due Date:</th>
                        <th>Payment State:</th>
                        <th>Subtotal:</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <div class="col-lg-1 mt-1 mt-lg-0" data-aos="fade-up" data-aos-delay="200"></div>
    </div>
</section>







@endsection
@push('scripts')
<script>
    tableInvoices = null
    function updateTable(){
        try{
            Swal.fire({
                title: 'Carregando...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });
            $.ajax({
                url:'{{route('selectInvoices')}}',
                method: 'get',
                assync: false,
                success:function(returned){
                    Swal.close()
                tableInvoices.clear().rows.add(returned).draw();
                },
                error:function(error, jhrx){
                    Swal.fire('Error!',"'"+error.responseText+"'" , 'error')
                    console.log(error, jhrx);
                }
            });
        }catch(e){
            Swal.fire('Error! ' + e, '', 'error')
        }
    }

    $(document).ready(function() {
        tableInvoices = $('#invoices').DataTable({
            scrollX: true,
            responsive: true,
            
            columns:[{
                data:'id'
            },{
                data:'state'
            },{
                data:'invoice_date_due'
            },{
                data:'payment_state'
            },{
                data:'amount_total_signed'
            }],
            columnDefs:[{
            target:5,
            render:function(data){
                return `<button type="button" class="btn btn-primary "id="download">Download</button>`;
            }
            }]
        });
        updateTable()
            $(document).on('click','#download',function(){
                let tr = $(this).closest('tr')
                let data = tableInvoices.row(tr).data()
                console.log(data.id)
                try{
                    Swal.fire({
                            title: 'Loading download...',
                            allowOutsideClick: false,
                            onBeforeOpen: () => {
                                Swal.showLoading();
                            }
                    });
                $.ajax({
                    url:'{{route('downloadInvoice')}}',
                    method: 'post',
                    data:{'id_invoice':data.id},
                    assync: false,
                    success:function(returned){
                       
                        // Simule um tempo de carregamento (substitua por sua lógica real)
                        
                            Swal.close(); // Feche o Swal após a simulação do carregamento
                        
                                        },
                    error:function(error, jhrx){
                        Swal.fire('Error!',"'"+error.responseText+"'" , 'error')
                        console.log(error, jhrx);
                    }
                });
            }catch(e){
                Swal.fire('Error! ' + e, '', 'error')
            }
        })
    });   



</script>
@endpush