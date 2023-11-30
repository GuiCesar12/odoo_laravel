<div class="container-fluid p-0">
    <div class="modal fade" id="exampleModalLong" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <h2 class="accordion-header" id="flush-headingOne">
                                  <button class="accordion-button collapsed" id="collapseProject" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    Payments
                                  </button>
                                </h2>
                            </div>
                            
                            {{-- <div class="col-md-4">
                                <h2 class="accordion-header" id="flush-headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                        Contracts
                                    </button>
                                </h2>
                            </div> --}}
                        </div>
                    </div>
                </div>   
            <div class="modal-body">
                <div class="accordion accordion-flush" id="accordionFlushExample">
                    <div class="accordion-item">
                        <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <section id="contact" class="contact">
                                                <div class="container" data-aos="fade-up">
                                                    <div class="row">
                                                        <div class="container" data-aos="fade-up">
                                                            <div class="row">
                                                                <div class="col-lg-1"></div>
                                                                <div class="col-lg-10 d-flex align-items-stretch">
                                                                    <div class="info"> 
                                                                        <form id="form_contract">
                                                                            
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label for="Name">Name contract:</label>
                                                                                    <input type="text" class="form-control" id="name_contract" name="name_contract">
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label for="type_contract">Type Contract:</label>
                                                                                    <input type="text" class="form-control"id="type_contract" name="type_contract">
                                                                                </div>
                                                                                
                                                                            </div>
                                                                            <div class="row">
                                                                                <div class="col-lg-4">
                                                                                    <label for="recurring_rule_type">Recurring rule type:</label>
                                                                                    <input type="text" class="form-control"id="recurring_rule_type" name="recurring_rule_type">
                                                                                </div>
                                                                                <div class="col-lg-4">
                                                                                    <label for="user_name">User name:</label>
                                                                                    <input type="text" class="form-control"id="user_name" name="user_name">
                                                                                </div>
                                                                            </div>
                                                                        </form>
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-1"></div>
                                                            </div>  
                                                        </div>  
                                                    </div>          
                                                    <div class="row">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-10 d-flex align-items-stretch">
                                                            <div class="info"> 
                                                                <div class="row">
                                                                    <div class="col-lg-8"></div>
                                                                    <div class="col-lg-2"><button class="btn btn-danger" id="cancel-alter">X</button> <button class="btn btn-secondary" id="edit_payment">Edit</button></div>
                                                                </div>
                                                                <form id="form_card">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label for="campo1">Card Number:</label>
                                                                            <input type="text" class="form-control" id="numero_cartao" name="numero_cartao">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="validade">Validity:</label>
                                                                            <input type="text" class="form-control"id="validade" name="validade">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            
                                                                            <input type="text" class="form-control" id="id_contrato" name="id_contrato">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label for="nome_cartao">Name Card:</label>
                                                                            <input type="text" class="form-control"id="nome_cartao" name="nome_cartao">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="cvv">Cvv:</label>
                                                                            <input type="text" class="form-control"id="cvv" name="cvv">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <br>
                                                                <button class="btn btn-primary" id="save_payment">Send</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1"></div>
                                                    </div>  
                                                </div>  
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="container-fluid p-0">
                                    <div class="col-12 col-lg-12">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






















<!-- Modal -->
{{-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="accordion-header" id="flush-headingThree">
                                <button class="accordion-button collapsed" id="paymentsCollapse" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                                    Payments
                                </button>
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <div class="accordion-item">
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="container-fluid p-0">
                                <div class="row">
                                    <div class="col-12 col-lg-12">
                                        <div class="row">
                                            <section id="contact" class="contact">
                                                <div class="container" data-aos="fade-up">
                                                    <div class="row">
                                                        <div class="col-lg-1"></div>
                                                        <div class="col-lg-10 d-flex align-items-stretch">
                                                            <div class="info"> 
                                                                <div class="row">
                                                                    <div class="col-lg-8"></div>
                                                                    <div class="col-lg-2"><button class="btn btn-danger" id="cancel-alter">X</button> <button class="btn btn-secondary" id="edit_payment">Edit</button></div>
                                                                </div>
                                                                <form id="form_card">
                                                                    
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label for="campo1">Card Number:</label>
                                                                            <input type="text" class="form-control" id="numero_cartao" name="numero_cartao">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="validade">Validity:</label>
                                                                            <input type="text" class="form-control"id="validade" name="validade">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            
                                                                            <input type="text" class="form-control" id="id_contrato" name="id_contrato">
                                                                        </div>
                                                                        
                                                                    </div>
                                                                    <div class="row">
                                                                        <div class="col-lg-4">
                                                                            <label for="nome_cartao">Name Card:</label>
                                                                            <input type="text" class="form-control"id="nome_cartao" name="nome_cartao">
                                                                        </div>
                                                                        <div class="col-lg-4">
                                                                            <label for="cvv">Cvv:</label>
                                                                            <input type="text" class="form-control"id="cvv" name="cvv">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                                <br>
                                                                <button class="btn btn-primary" id="save_payment">Send</button>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-1"></div>
                                                    </div>  
                                                </div>  
                                            </section>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>       
</div>
</div> --}}