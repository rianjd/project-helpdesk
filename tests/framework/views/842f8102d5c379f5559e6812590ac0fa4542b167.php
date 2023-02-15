<?php if($message = Session::get('erroemail')): ?>
    <script>
        document.getElementById('idTamanhoEmail').style.color = "red";
        document.getElementById('idEmail').style.borderBottom = "1px solid red";
        msg = "Esse campo não pode estar vazio";
        document.getElementById('idTamanhoEmail').innerText = msg;
    </script>
<?php endif; ?>
<?php if($message = Session::get('errosenha')): ?>
    <script>
        document.getElementById('idTamanhoSenha').style.color = "red";
        document.getElementById('idSenha').style.borderBottom = "1px solid red";
        msg = "Esse campo não pode estar vazio";
        document.getElementById('idTamanhoSenha').innerText = msg;
    </script>
<?php endif; ?>
<?php /**PATH C:\laragon\www\Bugs\resources\views/erros.blade.php ENDPATH**/ ?>