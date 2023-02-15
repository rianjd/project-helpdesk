<?php $__env->startSection('content'); ?>


<div class="container-fluid mt-2">
    <div class="p-5 mb-5" style="background-image: url('<?php echo e(URL::asset('images/back.jpg')); ?>'); border-radius:5px;">
        <h1 class="text-center" style="color: aliceblue">Estoque TI<i class="bi bi-box-seam ml-3" style="color: #fbca0a;"></i></h1>
        <p class="lead text-center" style="color: rgb(224, 224, 224)">Itens e materiais do TI</p>

    </div>

    <div class="row mb-3">

        
        <div class="col-1 text-right">
            <i class="bi bi-search"></i>
        </div>
        <div class="col-6">
            <input class="form-control mr-sm-2" id="searchbar" onkeyup="search_animal()" type="text" name="search" placeholder="Procurar itens..">
        </div>

        
        <div class="col-5 text-right">
            <a class=" btn btn-sec mt-2 mx-3" style="padding:0;" data-toggle="modal" data-target="#modalEstoque" title="Adicionar item">
                <h4 class="text-center"><i class="bi bi-plus-square"></i></h4>
                <p>Add Item</p>
            </a>
        </div>
    </div>

    <ul id='list' style="list-style-type: none;">

        <div class="row">
            <div class="col-md-12 " >
                <div class="card-header row " style="background: rgb(42, 57, 66); margin-left:.01px;margin-right:.01px;">
                    <div class="col-md-1 ">
                        <h5 class="text-center mt-2 mr-4" style="color: white !important;" >ID</h5>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-center mt-2  mr-3" style="color: white !important;" >Item / Material</h5>
                    </div>
                    <div class="col-md-2">
                        <h5 class="text-center mt-2 mr-3" style="color: white !important;" >Quantidade</h5>
                    </div>
                    <div class="col-md-3">
                        <h5 class="text-center mt-2 mr-5" style="color: white !important;" >Ultima atualização</h5>
                    </div>
                    <div class="col-md-2">
                        <h5 class="text-center mt-2 mr-3" style="color: white !important;" >Status</h5>
                    </div>

                </div>
                <div style="overflow-y:scroll; overflow-x:hidden; max-height:650px;">
                    <?php if(count($estoque) != 0): ?>
                        <?php $__currentLoopData = $estoque; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estoques): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="item_m ">
                                        <?php if($estoques['quantidade'] == '0'): ?> <div class="card-header row" style="background: rgba(230, 10, 10, 0.39); ">
                                        <?php elseif($estoques['quantidade'] <= 5): ?><div class="card-header row" style="background: #ffb0075e; ">
                                        <?php else: ?> <div class="card-header row" style="background: rgb(234, 233, 233); ">
                                        <?php endif; ?>
                                        <div class="col-md-1 " >
                                                <h5 class="text-center mt-1" readonly><?php echo e($estoques['id']); ?></h5>
                                        </div>
                                        <div class="col-md-3 ">
                                                <h5 class="text-center mt-1" ><?php echo e($estoques['item_material']); ?></h5>
                                        </div>
                                        <div class="col-md-2 " >
                                                <h5 class="text-center mt-1"><?php echo e($estoques['quantidade']); ?></h5>
                                        </div>
                                        <div class="col-3 " >
                                            <h5 class="text-center mt-1 mr-4 " ><?php echo e(date('d/m/20y', strtotime($estoques['ultima_att']))); ?></h5>
                                        </div>
                                        <div class="col-md-2 " >
                                            <?php if($estoques['quantidade'] == '0'): ?> <h5 class="text-center mt-1" ><i class="bi bi-x-circle" style="color:rgb(201, 6, 6);"></i></h5>
                                            <?php elseif($estoques['quantidade'] <= 5): ?> <h5 class="text-center mt-1" ><i class="bi bi-exclamation-circle" style="color:#ffb007"></i></h5>
                                            <?php else: ?> <h5 class="text-center mt-1" ><i class="bi bi-check" style="color: green;"></i></h5>
                                            <?php endif; ?>
                                        </div>
                                        <div class="col-1 text-right">
                                            <a class=" btn btn-sec mt-2" style="padding: 0;" data-toggle="modal" data-target="#modalEdita<?php echo e($estoques['id']); ?>" title="Editar">
                                                <h5 class="text-muted"><i class="bi bi-pencil-fill"></i></h5>
                                            </a>
                                        </div>
                                    </div>
                                </li>


                            
                            <div class= "modal fade" id="modalEdita<?php echo e($estoques['id']); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl" style="max-width: 1200px;">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="exampleModalLabel">
                                                Editar item
                                            </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="<?php echo e(route('edita.item')); ?>" method="post">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="card" style="border: 0;">
                                                    <div class="card-body row">
                                                        <div class="col-md-3 ">
                                                                <label for="nome_item" class="col-form-label sans">Nome item</label>
                                                                <input name="nome_item" value="<?php echo e($estoques['item_material']); ?>">
                                                        </div>

                                                        <div class=" offset-2 col-md-1 mx-2">
                                                                <label for="quant" class="col-form-label sans">Quantidade</label>
                                                                <input type="number" name="quant" value="<?php echo e($estoques['quantidade']); ?>">
                                                        </div>
                                                        <div class="offset-2 col-md-2 ">
                                                            <label for="categ" class="col-form-label sans">Categoria</label>
                                                            <select name="categ" >
                                                                <option value="<?php echo e($estoques['categoria']); ?>"><?php echo e($categoria[$estoques['categoria']]); ?></option>
                                                                <option value="1">Cabos</option>
                                                                <option value="2">Periféricos</option>
                                                                <option value="3">Eletrica</option>
                                                                <option value="4">Computador</option>
                                                                <option value="5">Impressora</option>
                                                                <option value="6">Monitor</option>
                                                                <option value="7">Telefonia</option>
                                                                <option value="8">Hardware</option>
                                                                <option value="9">Servidor</option>
                                                                <option value="10">Internet</option>
                                                                <option value="11">Outros</option>

                                                            </select>
                                                        </div>
                                                        <div class="col-2 offset-1 mt-4">
                                                                <input type="submit" value="Salvar" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                                                                <span class="submitting"></span>
                                                        </div>
                                                        <input type="hidden" name="id" value="<?php echo e($estoques['id']); ?>">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php endif; ?>
                </div>
            </div>

        </div>
    </ul>
</div>


<div class="container mb-5" style="margin-top: 100px;">
    <div class= "modal fade" id="modalEstoque" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="max-width: 1200px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">
                        Adicionar item ao estoque
                    </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
            <div class="card" style="border: 0;">
                <div class="card-body">
                    <form action="<?php echo e(route('inclui.item')); ?>" method="post">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                        <div class="col-md-4 form-group mb-5">
                            <label for="name" class="col-form-label sans">Nome item</label>
                            <input type="text" class="form-control" name="nome" id="nome" required placeholder="">
                        </div>
                        <div class="offset-1 col-md-4 form-group mb-5">
                            <label for="marca" class="col-form-label sans">Complemento</label>
                            <input type="text" class="form-control" name="marca" id="marca" placeholder="Opcional">
                        </div>
                        <div class="offset-1 col-md-2 form-group mb-5">
                            <label for="quant" class="col-form-label sans">Quantidade</label>
                            <input type="number" class="form-control" name="quant"  min="0" id="quant" required placeholder=" ">
                        </div>
                            <div class="col-md-4 form-group mb-8">
                                <label for="categ" class="col-form-label sans">Categoria *</label>
                                <select class="form-control" name="categ" required="">
                                    <option value="">Escolha...</option>
                                    <option value="1">Cabos</option>
                                    <option value="2">Periféricos</option>
                                    <option value="3">Eletrica</option>
                                    <option value="4">Computador</option>
                                    <option value="5">Impressora</option>
                                    <option value="6">Monitor</option>
                                    <option value="7">Telefonia</option>
                                    <option value="8">Hardware</option>
                                    <option value="9">Servidor</option>
                                    <option value="10">Internet</option>
                                    <option value="11">Outros</option>

                                </select>
                            </div>
                        <div class="col-md-12">
                                <div class="offset-10 col-md-2 form-group text-right">
                                    <input type="submit" value="Salvar" class="btn btn-block btn-primary rounded-0 py-2 px-4">
                                    <span class="submitting"></span>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
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
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.base-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Bugs\resources\views/admin/estoque.blade.php ENDPATH**/ ?>