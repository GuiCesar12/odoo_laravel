<!-- Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
</div>