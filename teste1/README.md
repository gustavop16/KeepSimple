# Teste para desenvolvedor Front-end/back PHP

### Teste 1

* 1 – consumir a api “https://viacep.com.br/ws/01001000/json/” trocando para um cep valido.
* 1,1 - Usar apenas html sem nenhuma biblioteca javascript ou css, para o consumo da api deve ser
usado o “fetch”.

# Tecnologia 

* HTML
* Javascript

# Comportamento

Foi criada uma página HTML padrão. 

Ao abrir a página é executado um função javascript chamada **getCep()**.
Essa função faz uma requisição get a api “https://viacep.com.br/ws/30130-003/json/” utilizando o método nativo "fetch" do javascript, passando como parâmetro o cep "30130-003". A api retorna um json com as informações referentes ao cep passado como parâmetro e é mostrado na tela.

# Autor 

* Gustavo Pereira 