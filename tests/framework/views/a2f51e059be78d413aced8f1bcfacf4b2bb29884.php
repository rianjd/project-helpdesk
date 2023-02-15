<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js"></script>
        <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic%7CBebasNeue%7CChanga%7CKoulen%7CPassion+One%7CYantramanav%7CChivo%7CMerriweather+Sans" rel="stylesheet">
        <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">



        <title>SUPORTE - LOCAL</title>

    </head>
<body  style="padding-top:10%;background-color:#c1dfff;">

    <div class="container">
        <div class="p-5 " >
            <div class="card offset-2 col-8 p-5 shadow">
                <h2 class="text-center mb-5">Login</h2>
                <form class="mb-5" action="<?php echo e(route('auth.login')); ?>" id="idForm" method="post">
                <?php echo e(csrf_field()); ?>


                    <div class="row justify-content-md-center">


                        <div class="col-md-8 ">
                            <div class="form-group ">
                                <div class="input-group">
                                    <i class="bi bi-person-fill mr-3" style="font-size: 25px;"></i><input type="text" class="form-control" name="email" id="idEmail" placeholder="Email">
                                </div>
                                <span class="ml-5" style="font-size:14px;" id="idTamanhoEmail"></span>
                            </div>
                            <div class="m-3"></div>
                            <div class="form-group mb-5">
                                <div class="input-group">
                                    <i class="bi bi-key mr-3" style="font-size: 25px;"></i><input type="password" name="password" id="idSenha"   placeholder="Senha" class="form-control" >
                                </div>
                                <span class="ml-5" style="font-size:15px;" id="idTamanhoSenha"></span>
                            </div>
                            <div class="justify-content-center">
                                <div class="form-group text-center">
                                    <input type="submit" value="Enviar" class="btn btn-primary rounded-0 py-2 px-4">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <?php if($message = Session::get('error')): ?>
                <div class="col-md-8 offset-md-2">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Usuário e/ou senha incorretos</strong> <br>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                    </div>
                </div>
            <?php endif; ?>
            </div>
    </div>
    <!--FORM VALIDATE-->
    <?php echo $__env->make('erros', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>


    <script>
        function valida(){
            var msg;
            if(document.getElementById('idSenha').value.length == 0){
                document.getElementById('idTamanho').style.color = "green";
                document.getElementById('idSenha').style.borderBottom = "1px solid g";
                msg = "Senha curta demais";
            }
            else{
                document.getElementById('idTamanho').style.color = "red";
                document.getElementById('idSenha').style.borderBottom = "1px solid red";
                msg = "Senha curta demais";
            }

            document.getElementById('idTamanho').innerText = msg;

        }
    </script>
</body>
</html>
<?php /**PATH C:\laragon\www\Bugs\resources\views/admin/adminchamados.blade.php ENDPATH**/ ?>