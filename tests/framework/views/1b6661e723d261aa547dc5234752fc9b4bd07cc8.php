<?php $__env->startSection('conteudo'); ?>

<div class="content">

    <div class="container">
      <div class="row align-items-stretch justify-content-center no-gutters">
        <div class="col-md-9">
          <div class="form h-100 contact-wrap p-5">
            <h2 class="text-center mb-5 pb-5">Ajuste de Usuario - Core</h2>
            <form class="mb-5" action="<?php echo e(route('form.store')); ?>" method="post" id="contactForm" name="contactForm">
              <?php echo e(csrf_field()); ?>


              <div class="row">
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label sans">Nome completo *</label>
                  <input type="text" class="form-control" name="nome" id="nome" required="" placeholder="">
                </div>
                <div class="col-md-6 form-group mb-5">
                  <label for="" class="col-form-label sans">Login Core*</label>
                  <input type="cpf" class="form-control" name="user" id="user" required=""  placeholder="Ex: 00.caixa.marcio">
                </div>
              </div>
              <div class="row">

                <div class="col-md-4 form-group align-self-end mb-5">
                    <label for="filial" class="col-form-label sans">Filial *</label>
                    <select class="form-control" name="filial" required="">
                    <option value="">Escolha...</option>
                    <option>99 - Matriz</option>
                    <option>01 - Joinville</option><option>02 - Biguaçu</option><option>03 - Palhoça</option><option>04 - Itajaí</option><option>06 - Balneario</option><option>08 - Centro</option>
                    <option>09 - Trindade</option><option>11 - Joinville(America)</option><option>12 - Blumenau</option><option>21 - Estreito</option><option>24 - Rio do Sul</option><option>26 - Itapema</option>
                    <option>27 - Jaraguá</option><option>28 - Blumenau</option><option>29 - Tijucas</option><option>30 - Brusque</option><option>32 - Vargem Grande</option><option>34 - Porto Belo</option>
                    <option>35 - Campeche</option>
                    </select>
                    <div class="invalid-feedback">
                        Por favor, escolha umA FILIAL.
                    </div>
                </div>
                <div class="col-md-6 form-group offset-md-2 mb-4">
                    <label for="" class="col-form-label sans">Email para contato*</label>
                    <div class="input-group"> <input type="text" name="email" placeholder="" class="form-control " required>
                        <div class="input-group-append"> <span class="input-group-text text-muted" style="font-size:12px;">@casasdaagua.com.br</span> </div>
                    </div>
                </div>
              </div>

              <div class="row mb-5">
                <div class="col-md-12 form-group mb-3">
                  <label for="message" class="col-form-label sans">Ajustes/Alterações *</label>
                  <textarea class="form-control" name="msg" id="msg" cols="30" rows="2" required  placeholder="Escreva aqui suas solicitações para o usuario..."></textarea>
                </div>
              </div>
              <div class="row justify-content-center">
                <div class="col-md-4 form-group text-center mb-5">
                  <input type="submit" value="Enviar" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                  <span class="submitting"></span>
                </div>
              </div>
              <p class="card-text"><i class="bi bi-info"></i> Caso não possua login no CORE, favor enviar planilha de Criação de usuario core.</p>
              <input type="hidden" id="tipo" name="tipo" value="Core">

            </form>

            <div class="max-width mt-5">
                <!--FORM VALIDATE-->
                <?php if($message = Session::get('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Formulário enviado com sucesso!</strong> <br>Sua solicitação foi enviada, aguarde o retorno.
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                <?php endif; ?>
            </div>

          </div>
        </div>
      </div>
    </div>

  </div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/coreforms.blade.php ENDPATH**/ ?>