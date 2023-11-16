@extends('index.main')
@section('content')
@include('contracts.modal')
<section id="why-us" class="why-us section-bg">
    <div class="container-fluid" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-10 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">
                <div class="content">
                    <h3><strong>Este são seus contratos </strong></h3>
                    <p>
                        Para acessar as informações de pagamento clique em Details
                    </p>
                </div>
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
                
            </div>
            <div class="col-lg-1 align-items-stretch" data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
        </div>
    </div>
</section>






@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

<script>
// function get_payments(){
//     try{
//             $.ajax({
//                 url:'{{route('selectContracts')}}',
//                 method: 'get',
//                 assync: false,
//                 success:function(returned){
//                     $.each(returned,function(){
//                         $('[name="row_collapse"]').innerHTML()
//                     })
//                 },
//                 error:function(error, jhrx){
//                     console.log(error, jhrx);
//                 }
//             });
//         }catch(e){
//             Swal.fire('Error! ' + e, '', 'error')
//         }
// }



tableContracts = null
    function updateTable(){
        try{
            Swal.fire({
                title: 'Atualizando a tabela...',
                allowOutsideClick: false,
                onBeforeOpen: () => {
                    Swal.showLoading();
                }
            });
            $.ajax({
                url:'{{route('selectContracts')}}',
                method: 'get',
                assync: false,
                success:function(returned){
                    Swal.close();
                tableContracts.clear().rows.add(returned).draw();
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
            return `<button type="button" class="btn btn-primary "id="modal" data-toggle="modal" data-target="#exampleModalLong">Payments</button>`;

        }
        }]
    });
    $('#id_contrato').hide()
    updateTable()
    $('#numero_cartao').inputmask('9999 9999 9999 9999');
    $('#cvv').inputmask('999')
    $('#validade').inputmask('99/9999')
});   
$(document).on('click','#modal',function(){
    let tr = $(this).closest('tr')
    let data = tableContracts.row(tr).data()
    $('#cancel-alter').hide()
    $('#save_payment').hide()
    $('#edit_payment').show()
    //pagamentos
    $('#id_contrato').val(data.id)
    $('#numero_cartao').val('000000000000'+data.numero_cartao_back.slice(-4)).attr('disabled','disabled')
    $('#numero_cartao').val('000000000000'+data.numero_cartao_back.slice(-4)).prop('disabled',true)
    $('#nome_cartao').val(data.nome_cartao_back).attr('disabled','disabled')
    $('#nome_cartao').val(data.nome_cartao_back).prop('disabled',true)
    $('#cvv').val(' ').attr('disabled','disabled')
    $('#cvv').val(' ').prop('disabled',true)
    $('#validade').val(' ').attr('disabled','disabled')
    $('#validade').val(' ').prop('disabled',true)
    $('#exampleModalLong').modal('toggle')
    $('#paymentsCollapse').click()
})
$(document).on('click','#edit_payment',function(){
    $('#cancel-alter').show()
    $('#edit_payment').hide()
    $('#save_payment').show()
    $('#numero_cartao').val(' ').attr('disabled','disabled')
    $('#numero_cartao').val(' ').prop('disabled',false)
    $('#nome_cartao').val(' ').attr('disabled','disabled')
    $('#nome_cartao').val(' ').prop('disabled',false)
    $('#cvv').val(' ').attr('disabled','disabled')
    $('#cvv').val(' ').prop('disabled',false)
    $('#validade').val(' ').attr('disabled','disabled')
    $('#validade').val(' ').prop('disabled',false)
})
$(document).on('click','#cancel-alter',function(){
    $('#cancel-alter').hide()
    $('#edit_payment').show()
    $('#save_payment').hide()
    $('#numero_cartao').val(' ').attr('disabled','disabled')
    $('#numero_cartao').val(' ').prop('disabled',true)
    $('#nome_cartao').val(' ').attr('disabled','disabled')
    $('#nome_cartao').val(' ').prop('disabled',true)
    $('#cvv').val(' ').attr('disabled','disabled')
    $('#cvv').val(' ').prop('disabled',true)
    $('#validade').val(' ').attr('disabled','disabled')
    $('#validade').val(' ').prop('disabled',true)
    $('#exampleModalLong').modal('toggle')

})
$(document).on('click','#save_payment',function(){
    try{
        //verifyForm();
        $('#form_card').serialize()
        Swal.fire({
            title: 'Do you want to save the card?',
            // showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ok',
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                Swal.fire({
                    title: 'Carregando...',
                    allowOutsideClick: false,
                    onBeforeOpen: () => {
                        Swal.showLoading();
                    }
                });
                $.ajax({
                    url: '{{route('updatePayments')}}',
                    data: $('#form_card').serialize(),
                    method: 'post',
                    assync: false,
                    success: function(returned){
                        $('#exampleModalLong').modal('toggle')
                        updateTable()
                        Swal.fire('Success!','Success saved' , 'success')

                        
                    },
                    error: function(error, jhrx){
                        Swal.fire('Error!',"'"+error.responseText+"'" , 'error')
                        console.log(error, jhrx);
                    }
                });
                
            }
        });
    }catch(e){
        Swal.fire('Error! ' + e, '', 'error')
    }
})



</script>
@endpush