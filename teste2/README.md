# Teste para desenvolvedor Front-end/back PHP

### Teste 2
* Construir uma aplicação em PHP utilizando o Framework Laravel
* 1 - Consumir a api do github(não utilizar GuzzleHttp ou qualquer biblioteca de terceiro, apenas 
código nativo)
* 1.1 - Possibilitar consultar por nome de usuário
* 1.2 - Criar uma view simples para exibir os dados do usuário consultado

# Tecnologia 

* Laravel Framework 10.20.0
* Javascript

# Comportamento

Foi criado uma página com um campo de consulta onde será inserido o nome de um usuário do github.

Ao inserir o usuário e clicar no botão consultar, a aplicação faz uma requisição get a api "https://api.github.com/users/username/repos" utilizando o método nativo "fetch" do javascript, passando como parâmetro o nome do usuário digitado.

A api retorna um json com as informações referentes ao usuário passado como parâmetro e é mostrado na tela o nome do projeto e a url. Se for digitado um usuário inexistente é mostrado a mensagem "Usuário não encontrado!". Se o usuário não conter nenhum repositório público é mostrado na tela a mensagem "Nenhum repositório público encontrado!".

# Autor 

* Gustavo Pereira 