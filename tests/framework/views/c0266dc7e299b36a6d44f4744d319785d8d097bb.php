<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
      <link rel="stylesheet" href="<?php echo e(URL::asset('css/style.css')); ?>">
      <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
      <link href="//fonts.googleapis.com/css?family=Lato:300,400,700,400italic%7CJosefin+Sans:400,700,300italic%7CBebasNeue%7CChanga%7CKoulen%7CPassion+One%7CYantramanav%7CChivo%7CMerriweather+Sans" rel="stylesheet">
      <link rel="icon" type="image/png" sizes="32x32" href="images/favicon-32x32.png">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
      <title>LOGIN</title>
   </head>
   <!-- <a class="btn btn-sec" href="/"><i class="bi bi-arrow-left m-4" style="font-size: 25px;"></i></a> -->
   <body  style="padding-top:5%;background-color:#305377;">

      <div class="container">
            <div class="col-md-12 ">
                <h1 class="card-title text-center" style="font-family: Koulen; color:rgb(255, 253, 253);">
                    <i class="bi bi-ticket-perforated ml-4 mr-4" style="color: rgb(255, 196, 0); "></i>Acompanhamento de chamados
                </h1>
            </div>
      <div class="pt-5 " >
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
        
    <div class="text-center p-4" style="color:aliceblue; " >
         Desenvolvido por : Casas da Água © 2022
    </div>
   </body>
</html>
<?php /**PATH C:\laragon\www\Bugs\resources\views/login.blade.php ENDPATH**/ ?>