@if ($message = Session::get('erroemail'))
    <script>
        document.getElementById('idTamanhoEmail').style.color = "red";
        document.getElementById('idEmail').style.borderBottom = "1px solid red";
        msg = "Esse campo não pode estar vazio";
        document.getElementById('idTamanhoEmail').innerText = msg;
    </script>
@endif
@if ($message = Session::get('errosenha'))
    <script>
        document.getElementById('idTamanhoSenha').style.color = "red";
        document.getElementById('idSenha').style.borderBottom = "1px solid red";
        msg = "Esse campo não pode estar vazio";
        document.getElementById('idTamanhoSenha').innerText = msg;
    </script>
@endif
