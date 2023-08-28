<!DOCTYPE html>
<html>
<head>
<title>Teste 2</title>

<style>
    .m-b-20{
        margin-bottom: 20px;
    }
</style>

</head>
<body>
    <div class="m-b-20">
        <label>Digite o nome de usuário do Github: </label>
        <input type="text" name="username" id="username">
        <button type="button" onclick="getGithub()">Consultar</button>
    </div>

    <table id="list-rep"></table>
</body>

<script>

    function getGithub(){

        var username = document.querySelector("#username").value;
        var url      = 'https://api.github.com/users/'+username+'/repos';
        var response = '';

        fetch(url)
        .then(function (resp) {
            return (!resp.ok) ? false : resp.json();
        })
        .then(function (data) {

            if(!data){
                document.querySelector("#list-rep").innerHTML = '<tbody><td colspan="2">Usuário não encontrado!</td></tbody>';
                return false;
            }
        
            if(data.length > 0){
                response = '<thead><th>Projeto</th><th>Url</th></thead>';
                data.forEach(function(item, key) {
                    response += '<tbody>';
                    response += '<td>'+item.name+'</td>';
                    response += '<td>'+item.url+'</td>';
                    response += '</tbody>';
                });
            }else{
                response += '<thead><td colspan="2">Nenhum repositório público encontrado!</td></thead>';
            }
            document.querySelector("#list-rep").innerHTML = response;
        })
        .catch(function(error) {
            alert('Ocorreu um erro ao consultar este usuário!')
            console.log(error);
        });
    }

</script>

</html>