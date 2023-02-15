<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

<?php
$filiais = array(
    '00' => array(
        'nome' =>'Matriz - São José',
        'endereco'=>'Av. Presidente Kennedy, 1284 - Campinas',
        'numero'=>'(48) 3271-3055',
        'CNPJ'=>'13.501.187/0001-59',
        'gerente'=>'Eduardo',
        'horario'=>'07:30 às 19:00',
        'FTP'=>'192.168.1.237',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#Matriz',
    ),
    '01' => array(
        'nome' =>'Filial 01 - Joinville',
        'endereco'=>'Rua Santa Catarina, 1194 | CEP: 89.211-301',
        'numero'=>'(47) 3436-0855',
        'CNPJ'=>'13.501.187/0005-82',
        'gerente'=>'Eduardo',
        'horario'=>'07:30 às 19:00',
        'FTP'=>'192.168.131.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_01_-_Rua_Santa_Catarina,_1194_Floresta_%E2%80%93_Joinville/SC',
    ),
    '02' => array(
        'nome' =>'Filial 02 - Biguaçu',
        'endereco'=>'Endereço: Rua Pref. Paulo Frederico A. Wildner, 128 | CEP: 88.161-048',
        'numero'=>'(48) 3243-3633',
        'CNPJ'=>'13.501.187/0014-73',
        'gerente'=>'Douglas Otavio Machado',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.119.6',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_02_-_Rua_Prefeito_Paulo_Frederico_Alves_Wildner,_128_-_Universit%C3%A1rio_%E2%80%93_Bigua%C3%A7u/SC',
    ),
    '03' => array(
        'nome' =>'Filial 03 - Palhoça',
        'endereco'=>'Av. Bom Jesus de Nazaré, 79 | CEP: 88.135-100',
        'numero'=>'(48) 3342-0274',
        'CNPJ'=>'13.501.187/0002-30',
        'gerente'=>'Raphael de Farias Dias',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.129.6',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_03_-_Av._Bom_Jesus_de_Nazar%C3%A9,_79,_Ariri%C3%BA_%E2%80%93_Palho%C3%A7a/SC',
    ),
    '04' => array(
        'nome' =>'Filial 04 - Itajaí',
        'endereco'=>'Av. Sete de Setembro, 361 | CEP: 88.301-201',
        'numero'=>'(47) 3348-1266',
        'CNPJ'=>'13.501.187/0010-40',
        'gerente'=>'Valmir Hames',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.125.55',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '06' => array(
        'nome' =>'Filial 06 - Balneário Camboriú',
        'endereco'=>'Av. Do Estado, 3436 | CEP: 88.338-065',
        'numero'=>'(47) 3367-4144',
        'CNPJ'=>'13.501.187/0009-06',
        'gerente'=>'Fabio Varela',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.127.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '08' => array(
        'nome' =>'Filial 08 - Centro',
        'endereco'=>'Av. Francisco Tolentino, 549 | CEP: 88.010-200',
        'numero'=>'(48) 3225-4454',
        'CNPJ'=>'13.501.187/0013-92',
        'gerente'=>'Murilo Aldo Patrício',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.128.4',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '09' => array(
        'nome' =>'Filial 09 - Trindade',
        'endereco'=>'Av. Das Saudades, 02/A | CEP: 88.036-010',
        'numero'=>'(48) 3333-1088',
        'CNPJ'=>'13.501.187/0012-01',
        'gerente'=>'Fernando Marcelino de Jesus',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.130.40',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '11' => array(
        'nome' =>'Filial 11 - Joinville',
        'endereco'=>'Rua Dr. João Collin, 2270 | CEP: 89.204-002',
        'numero'=>'(47) 3435-1166',
        'CNPJ'=>'13.501.187/0006-63',
        'gerente'=>'Alessandro Martins Moreira',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.133.12',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '12' => array(
        'nome' =>'Filial 12 - Blumenau',
        'endereco'=>'Rua São Paulo, 2070 | CEP: 89.030-000',
        'numero'=>'(47) 3340-0777',
        'CNPJ'=>'13.501.187/0016-35',
        'gerente'=>'Edgar João',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.122.3',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '21' => array(
        'nome' =>'Filial 21 - Estreito',
        'endereco'=>'Rua Gen. Liberato Bittencourt, 2011 | CEP: 88.070-800',
        'numero'=>'(48) 3244-0433',
        'CNPJ'=>'13.501.187/0015-54',
        'gerente'=>'Maycon Douglas',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.123.',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '24' => array(
        'nome' =>'Filial 24 - Rio do Sul',
        'endereco'=>'Rua Coelho Neto, 109 | CEP: 89.160-155',
        'numero'=>'(47) 3521-0011',
        'CNPJ'=>'13.501.187/0008-25',
        'gerente'=>'Daniel A. Souza',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.124.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '26' => array(
        'nome' =>'Filial 26 - Itapema',
        'endereco'=>'Rua Nereu Ramos, 3141 | CEP: 88.220-000',
        'numero'=>'(47) 3368-7272',
        'CNPJ'=>'13.501.187/0011-20',
        'gerente'=>'Rodrigo Antonio S. Silveira',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.126.231',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
      ),
    '27' => array(
        'nome' =>'Filial 27 - Jaraguá do Sul',
        'endereco'=>'Rua Reinoldo Rau, 752 | CEP: 89.251-600',
        'numero'=>'(47) 3275-0204',
        'CNPJ'=>'13.501.187/0007-44',
        'gerente'=>'Alduir Disner',
        'horario'=>'08:00 às 18:30',
        'FTP'=>'192.168.132.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '28' => array(
        'nome' =>'Filial 28 - Blumenau',
        'endereco'=>'Rua Itajaí, 1867 | CEP: 89.015-203',
        'numero'=>'(47) 3322-7666',
        'CNPJ'=>'13.501.187/0004-00',
        'gerente'=>'Alexandre C. Figueira',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.136.10',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '29' => array(
        'nome' =>'Filial 29 - Tijucas',
        'endereco'=>'BR-101, 163 | CEP: 88.200-000',
        'numero'=>'(48) 3263-5166',
        'CNPJ'=>'13.501.187/0003-10',
        'gerente'=>'Anderson Bazilio Lourenço',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.157.22',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '30' => array(
        'nome' =>'Filial 30 - Brusque',
        'endereco'=>'Av. Getúlio Vargas, 98 | CEP: 88.353-000',
        'numero'=>'(47) 3355-9500',
        'CNPJ'=>'13.501.187/0019-88',
        'gerente'=>'Fernando Henrique Neves',
        'horario'=>'08:00 às 18:30',
        'FTP'=>'192.168.134.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '32' => array(
        'nome' =>'Filial 32 - Florianópolis',
        'endereco'=>'Rod. Armando C. Bulos | CEP: 88.058-000',
        'numero'=>'(48) 3369-9171',
        'CNPJ'=>'13.501.187/0018-05',
        'gerente'=>'Wagner O. Campos',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.135.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '34' => array(
        'nome' =>'Filial 34 - Porto Belo',
        'endereco'=>'Av. Governador Celso Ramos | CEP: 88.210-000',
        'numero'=>'(47) 3369-4330',
        'CNPJ'=>'13.501.187/0021-00',
        'gerente'=>'Gustavo Lemos',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.137.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '35' => array(
        'nome' =>'Filial 35 - Florianópolis',
        'endereco'=>'Rod. Francisco Magno Vieira | CEP: 88.065-000',
        'numero'=>'(48) 3226-1999',
        'CNPJ'=>'13.501.187/0022-83',
        'gerente'=>'Luiz Gustavo Seemann',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.138.50',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_04_-_Av._Sete_de_Setembro,_361_Centro_%E2%80%93_Itaja%C3%AD/SC',
    ),
    '36' => array(
        'nome' =>'Filial 36 - Itajaí',
        'endereco'=>'Av. Governador Adolfo Konder, 1700 | CEP: 88.308-004',
        'numero'=>'(48) 3271-3000',
        'CNPJ'=>'13.501.187/0023-64',
        'gerente'=>'Marcio Vieira',
        'horario'=>'07:30 às 18:30',
        'FTP'=>'192.168.125.55',
        'XEN'=>'',
        'link2'=>'',
        'link'=>'http://wiki.casasdaagua.com.br/index.php/Rede_802.xx-WIFI)#FILIAL_36_-_AV_GOVERNADOR_ADOLFO_KONDER_-_Itajai_-_SC',
    ),



);


?>


<?php $__env->startSection('content'); ?>
<div class="container-fluid p-5 ">

    <div class="row">
        <div class="col-3 mt-4">
          <div class="list-group" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action" id="list-home-list" data-toggle="list" href="#list-home" role="tab" aria-controls="home"><i class="bi bi-search mr-2"></i>Pesquisar</a>
            <?php $__currentLoopData = $filiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a class="list-group-item list-group-item-action" id="list-<?php echo e($key); ?>-list" data-toggle="list" href="#list-<?php echo e($key); ?>" role="tab" aria-controls="<?php echo e($key); ?>"><?php echo e($filial['nome']); ?></a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
        <div class="col-9 ">
            <ul id='lista' style="list-style-type: none;">
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="list-home" role="tabpanel" aria-labelledby="list-home-list">
                        <div class="row offset-1 fadeInRight">
                            <div class="col-1 text-right">
                                <i class="bi bi-search"></i>
                            </div>
                            <div class="col-6 mb-5" >
                                <input class="form-control mr-sm-2" id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Procurar itens..">
                            </div>
                        </div>
                        <?php $__currentLoopData = $filiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item_m ">
                                <div class=" offset-1 col-md-9 mt-2 mb-5 fadeInRight2">
                                    <div class="card shadow-lg text-left p-4">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card-body">

                                                    <h3 class="card-title" style="color: #e4b703;"><?php echo e($filial['nome']); ?></h3>
                                                    <h5 class="mt-3"><i class="bi bi-geo-alt-fill mr-3" style="color: #03285f;"></i><?php echo e($filial['endereco']); ?></h5>
                                                    <h5 ><i class="bi bi-telephone-fill mr-3" style="color: #03285f;"></i><?php echo e($filial['numero']); ?></h5>
                                                    <h5 ><i class="bi bi-credit-card-2-front mr-3" style="color: #03285f;"></i><?php echo e($filial['CNPJ']); ?></h5>
                                                    <h5 ><i class="bi bi-person mr-3" style="color: #03285f;"></i>Gerente: <?php echo e($filial['gerente']); ?> </h5>
                                                    <h5 ><i class="bi bi-smartwatch mr-3" style="color: #03285f;"></i><?php echo e($filial['horario']); ?></h5>
                                                    <h5 ><i class="bi bi-hdd-stack mr-3" style="color: #03285f;"></i><?php echo e($filial['FTP']); ?></h5>
                                                    <h5 ><i class="bi bi-pc-horizontal mr-3" style="color: #03285f;"></i><?php echo e($filial['XEN']); ?></h5>
                                                    <h5><i class="bi bi-wifi mr-3"></i><a href=<?php echo e($filial['link']); ?>>Roteadores<i class="bi bi-box-arrow-in-up-right ml-2"></i></a></h5>
                                                    <h5><i class="bi bi-printer-fill mr-3"></i><a href=<?php echo e($filial['link2']); ?>>Impressoras<i class="bi bi-box-arrow-in-up-right ml-2"></i></a></h5>
                                                    <h5 ></h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card-body" >
                                                        <div class="col-12 mb-4"><h3 class="card-title text-center">Computadores</h3></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>CX"><div class="card"><h5 class="m-2 text-center">CAIXA</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">VENDAS</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">CREDIARIO</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">GERENTE</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>"><div class="card"><h5 class="m-2 text-center">TODOS</h5></div></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>


                    <?php $__currentLoopData = $filiais; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $filial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="tab-pane fade teste " id="list-<?php echo e($key); ?>" role="tabpanel" aria-labelledby="list-<?php echo e($key); ?>-list">
                                <div class=" offset-1 col-md-9 mt-2 mb-5">
                                    <div class="card shadow-lg text-left p-4">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="card-body">

                                                    <h3 class="card-title" style="color: #e4b703;"><?php echo e($filial['nome']); ?></h3>
                                                    <h5 class="mt-3"><i class="bi bi-geo-alt-fill mr-3" style="color: #03285f;"></i><?php echo e($filial['endereco']); ?></h5>
                                                    <h5 ><i class="bi bi-telephone-fill mr-3" style="color: #03285f;"></i><?php echo e($filial['numero']); ?></h5>
                                                    <h5 ><i class="bi bi-credit-card-2-front mr-3" style="color: #03285f;"></i><?php echo e($filial['CNPJ']); ?></h5>
                                                    <h5 ><i class="bi bi-person mr-3" style="color: #03285f;"></i>Gerente: <?php echo e($filial['gerente']); ?> </h5>
                                                    <h5 ><i class="bi bi-smartwatch mr-3" style="color: #03285f;"></i><?php echo e($filial['horario']); ?></h5>
                                                    <h5 ><i class="bi bi-hdd-stack mr-3" style="color: #03285f;"></i><?php echo e($filial['FTP']); ?></h5>
                                                    <h5 ><i class="bi bi-pc-horizontal mr-3" style="color: #03285f;"></i><?php echo e($filial['XEN']); ?></h5>
                                                    <h5><i class="bi bi-wifi mr-3"></i><a href=<?php echo e($filial['link']); ?>>Roteadores<i class="bi bi-box-arrow-in-up-right ml-2"></i></a></h5>
                                                    <h5><i class="bi bi-printer-fill mr-3"></i><a href=<?php echo e($filial['link2']); ?>>Impressoras<i class="bi bi-box-arrow-in-up-right ml-2"></i></a></h5>
                                                    <h5 ></h5>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <div class="card-body" >
                                                        <div class="col-12 mb-4"><h3 class="card-title text-center">Computadores</h3></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>CX"><div class="card"><h5 class="m-2 text-center">CAIXA</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">VENDAS</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">CREDIARIO</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>EA"><div class="card"><h5 class="m-2 text-center">GERENTE</h5></div></a></div>
                                                        <div ><a href="computadores/<?php echo e($key); ?>"><div class="card"><h5 class="m-2 text-center">TODOS</h5></div></a></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </ul>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script>
        function search_animal() {
            let input = document.getElementById('searchbar').value
            input=input.toLowerCase();
            let x = document.getElementsByClassName('item_m');


            for (i = 0; i < x.length; i++) {
                if (!x[i].innerHTML.toLowerCase().includes(input)) {
                    x[i].style.display="none";
                }
                else {
                    x[i].style.display="list-item";

                }
            }
        }

        function teste(id){
            document.getElementById("list-"+id).classList.add('show','active');
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/filiais.blade.php ENDPATH**/ ?>