<!DOCTYPE html>
<html>
<head>
<title>Teste 3</title>

<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    .m-b-20{
        margin-bottom: 20px;
    }
</style>

</head>
<body>
    <div class="m-b-20">
        <label>Digite um ou mais CEP´S separados por vírgula e sem espaço: </label>
        <input type="text" name="cep" id="cep">
        <button type="button" onclick="searchCep()">Consultar</button>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>cep</th>
                <th>logradouro</th>
                <th>complemento</th>
                <th>bairro</th>
                <th>localidade</th>
                <th>uf</th>
                <th>ibge</th>
                <th>gia</th>
                <th>ddd</th>
                <th>siafi</th>
            </tr>
        </thead>
        <tbody id="list-cep"></tbody>
      </table>

      <button type="button" onclick="exportFileCsv()">Exportar</button>
      <button type="button" onclick="clearList()">Limpar</button>      
    
</body>

<script type="text/javascript" charset="utf-8">

    var arr_resp_ceps = [];

    function searchCep(){
        clearList();
        var input_ceps  = document.querySelector("#cep").value.trim();
        if(input_ceps.length > 0){
            arr_ceps = input_ceps.split(",");
            arr_ceps.forEach(function(value, key) {
                getViaCep(value);
            });
        }else{
            alert('Digite um CEP!');
        }        
    }

    function getViaCep(cep){

        var url = 'https://viacep.com.br/ws/'+cep+'/json/';
    
        fetch(url)
        .then(function (resp) {
            return (!resp.ok) ? false : resp.json();
        })
        .then(function (data) {
            if(!data.erro){
                createListResponse(data);
            }else{
                createListResponse({'error': true,'message' : cep + ' - CEP não encontrado!'});
            }                               
        })
        .catch(function(error) {
            console.log(error)
            createListResponse({'error': true, 'message' : cep + ' - CEP inválido!'});   
        });   
    }

    
    function createListResponse(response){
        var item      = '';
        var list_ceps = document.querySelector("#list-cep")

        if(response.error){
            item += '<tr>';
            item += '<td colspan="10">'+response.message+'</td>';    
            item += '</tr>';
        }else{
            item += '<tr>';
            item += '<td>'+response.cep+'</td>';
            item += '<td>'+response.logradouro+'</td>';
            item += '<td>'+response.complemento+'</td>';
            item += '<td>'+response.bairro+'</td>';
            item += '<td>'+response.localidade+'</td>';
            item += '<td>'+response.uf+'</td>';
            item += '<td>'+response.ibge+'</td>';
            item += '<td>'+response.gia+'</td>';
            item += '<td>'+response.ddd+'</td>';
            item += '<td>'+response.siafi+'</td>';
            item += '</tr>';
        }
        list_ceps.innerHTML += item;
        arr_resp_ceps.push(response);
    }

    function exportFileCsv(){

        if(arr_resp_ceps.length == 0){
            alert('Faça uma consulta para exportar o arquivo!');
            return false;
        }

        var options = {
            method: 'POST',
            credentials: "same-origin",
            headers: {
            "Content-Type": "application/json",
            "Accept": "application/json",
            "X-Requested-With": "XMLHttpRequest",
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({'ceps': arr_resp_ceps}),
        };

        fetch('{{route("export.data.cep")}}', options)
        .then(function (resp) {
            return (!resp.ok) ? false : resp.json();
        })
        .then(function (data) {
            download(data.file)   
        })
        .catch(function(error) {
            console.log(error);
        });
    }

    function download(file) {
        var link = document.createElement("a");
        link.download = file;
        link.href = file;
        link.click();
        alert('efetuando download do arquivo!')
    }

    function clearList() {
        document.querySelector("#list-cep").innerHTML = '';
    }

</script>

</html>