# Teste para desenvolvedor Front-end/back PHP

### Teste 3
* Construir uma aplicação em PHP utilizando o Framework Laravel
* 1 - Consumir a api do github(não utilizar GuzzleHttp ou qualquer biblioteca de terceiro, apenas código nativo)
* 1.1 - Possibilitar consultar por nome de usuário
* 1.2 - Criar uma view simples para exibir os dados do usuário consultado

* 1 – consumir a api “https://viacep.com.br/ws/01001000/json/” (não utilizar GuzzleHttp ou qualquer biblioteca de terceiro, apenas código nativo)
* 2 – construir uma view simples possibilitando:
* 2.1 - possibilitar consultar um ou mais cep’s
* 2.2 – ao consultar deve-se preencher uma table html com as informações retornadas pela api
* 3 – criar um botão para exportar todos os registros de cep’s consultados em um arquivo no formato csv
* 4 – criar um botão para limpar todo o conteúdo da table htm

# Tecnologia 

* Laravel Framework 10.20.0
* Javascript

# Comportamento

Foi criado uma página com um campo de consulta onde será inserido um ou vários CEP´s.

Ao inserir um ou vários CEP´s separados por vírgula e clicar no botão consultar, é chamado um método javascript "searchCep()", esse método recebe os ceps como parêmetro e o transforma em um array com todos os ceps digitados. A partir disso a aplicação faz uma requisição get (para cada cep digitado) a api “https://viacep.com.br/ws/CEP/json/” utilizando o método nativo "fetch" do javascript, passando como parâmetro o(s) cep(s) digitado.

A api retorna um json com as informações referentes ao cep passado como parâmetro e é criado uma tabela mostrando o resultado da consulta de cada cep.

Se for digitado um CEP fora do padrão é mostrado a mensagem "CEP inválido!". Se for digitado um CEP inexistente é mostrado a mensagem "CEP não encontrado!".

O usuário poderá exportar um arquivo CSV com a listagem dos ceps consultados clicando no botão "Exportar". Ao clicar neste botão é chamado um método javascript "exportFileCsv()", onde é feito uma requisição post via "fetch" de uma método da aplicação chamado "exportDataCep" criado no arquivo "CepController.php".

Este método recebe como parâmetro um array com o retorno de todos os ceps consultados, a partir disso é criado o arquivo "data_ceps.csv" utilizando o método nativo do PHP "fputcsv" e retornado um json com o nome do arquivo criado.

Ao receber o retorno do backend, o método exportFileCsv chama função download para baixar o arquivo csv. 


# Autor 

* Gustavo Pereira 