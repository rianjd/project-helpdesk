<?php $__env->startSection('conteudo'); ?>

<!-- Breadcrumbs-->
<section class="breadcrumbs-custom bg-image" style="background-image: url(images/breadcrumbs-image2.jpg);">
  <div class="shell">
    <h1 class="breadcrumbs-custom__title">Entre em contato</h1>
    <ul class="breadcrumbs-custom__path">
      <li><a href="bugs">Home</a></li>
      <li class="active">Faça seu pedido</li>
    </ul>
  </div>

</section>
<section class="section section-md bg-white">
  <div class="shell">
    <div class="range">
      <div class="cell-xs-12">
        <h2>Como pedir?</h2>
        <div class="range range-30 range-center">
          <div class="cell-xs-10 cell-sm-6 cell-md-4">
            <article class="box-minimal">
              <div class="box-minimal__icon fa fa-whatsapp"></div>
              <h3 class="box-minimal__title">Whatsapp</h3>
              <div class="box-minimal__divider"></div>
              <div class="box-minimal__text">Converse conosco no Whatsapp e detalhe seu pedido, envie exemplos, desenhos, modelos, etc...</div>
            </article>
          </div>
          <div class="cell-xs-10 cell-sm-6 cell-md-4">
            <article class="box-minimal">
              <div class="box-minimal__icon fa fa-google"></div>
              <h3 class="box-minimal__title">Email</h3>
              <div class="box-minimal__divider"></div>
              <div class="box-minimal__text">Descreva seu pedido dealhadamente, entraremos em contato o mais rapido possivel para confirmar o pedido e confirmar suas preferencias.</div>
            </article>
          </div>
          <div class="cell-xs-10 cell-sm-6 cell-md-4">
            <article class="box-minimal">
              <div class="box-minimal__icon fa fa-phone"></div>
              <h3 class="box-minimal__title">Telefone</h3>
              <div class="box-minimal__divider"></div>
              <div class="box-minimal__text">Por telefonemas marcamos horarios de atendimento e consiguimos os melhores detalhes para o seu produto.<br> (48) 99123-1975</div>
            </article>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Get in Touch-->
<section class="section section-md bg-white text-center">
  <div class="shell">
    <div class="range range-md-center">
      <div class="cell-md-11 cell-lg-10">
        <h2 class="text-bold">Peça agora</h2>
        <p><span class="box-width-2">Nós entraremos em contato com você para saber mais detalhes do seu pedido. Aguarde.</span></p>
        <div class="layout-columns">
          <div class="layout-columns__main">
            <div class="layout-columns__main-inner">
              <!-- RD Mailform-->
              <form class="rd-mailform" data-form-output="form-output-global" data-form-type="contact" method="post" action="<?php echo e(url ('/')); ?>">
                <div class="form-wrap">
                  <input class="form-input" id="contact-date" type="text" data-time-picker="date" name="date" data-constraints="@Required">
                  <label class="form-label" for="contact-date">Event Date</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                  <label class="form-label" for="contact-name">Your Name</label>
                </div>
                <div class="form-wrap">
                  <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email  @Required">
                  <label class="form-label" for="contact-email">E-mail</label>
                </div>
                <div class="form-wrap">
                  <label class="form-label" for="contact-message">Your Message</label>
                  <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                </div>
                <div class="form-wrap form-button offset-1">
                  <button class="button button-block button-primary-outline button-ujarak" type="submit">make an appointment</button>
                </div>
              </form>
            </div>
          </div>
          <div class="layout-columns__aside">
            <div class="layout-columns__aside-item">
              <p class="heading-5">Sociais</p>
              <div class="divider-modern"></div>
              <ul class="list-inline-xs">
                <li><a class="icon icon-md icon-gray-7 fa fa-instagram" href="#"></a></li>
                <li><a class="icon icon-md icon-gray-7 fa fa-google" href="#"></a></li>
              </ul>
            </div>
            <div class="layout-columns__aside-item">
              <p class="heading-5">Fone</p>
              <div class="divider-modern"></div>
              <div class="unit unit-horizontal unit-spacing-xxs">
                <div class="unit__left"><span class="icon icon-md icon-primary material-icons-local_phone"></span></div>
                <div class="unit__body"><a href="tel:#">(48) 99123-1975</a></div>
              </div>
            </div>
            <div class="layout-columns__aside-item">
              <p class="heading-5">Endereço</p>
              <div class="divider-modern"></div>
              <div class="unit unit-horizontal unit-spacing-xxs">
                <div class="unit__left"><span class="icon icon-md icon-primary material-icons-location_on"></span></div>
                <div class="unit__body"><a href="#">Rua Vereador Adolfo Bunn, 7 / CEP 88104-010</a></div>
              </div>
            </div>
            <div class="layout-columns__aside-item">
              <p class="heading-5">Horario de atendimento</p>
              <div class="divider-modern"></div>
              <div class="unit unit-horizontal unit-spacing-xxs">
                <div class="unit__left"><span class="icon icon-md icon-primary mdi mdi-clock"></span></div>
                <div class="unit__body"><span>Todos os dias das 8:00 as 12:00 / 14:00 as 20:00</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('welcome', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/contato.blade.php ENDPATH**/ ?>