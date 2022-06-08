# PROJETO LARAVEL SANTRI #

Esse Projeto foi montando em cima de um ambiente docker

### Quais são os requisitos? ###

#Baixar as Seguintes ferramentas:#
* Docker
* Docker Compose

### Depois de baixar o que fazer ? ###

* rodar o comando ~ docker-compose up --d
* após isso, entrar no container do php-apache_container (para encontrar o nome do container/id rode o comando ~ docker ps    ou  ~ docker-compose ps)
* rodar o ~ composer install
* rodar o ~ cp .env.example .env
* sair do container e rodar o comando ~ docker-compose run artisan key:generate
* rodar o comando ~ docker-compose run artisan config:clear
* rodar o comando ~ docker-compose run artisan cache:clear
* e isso já basta para rodar a aplicação
* caso tenha algum problema de permissão entre no container e rode chmod nas pastas storage e boostrap/cache

### PORTAS, USUARIOS E SENHAS ###

* A Aplicação está rodando no apache onde está setado a porta 8000
* o banco de dados foi setado para a porta padrão 3306 ( caso tenha algum problema com o container do mysql, pode ter a possiblidade de conflito a porta do mysql da sua máquina e o container do mysql)
* o usuário do mysql é: root
* e não possuí senha, então basta deixa-lá vazia
* o nome do banco de dados é: teste

### "TENHO UMA DÚVIDA SOBRE COMO RODAR O PROJETO" ###

Caso tenha alguma dúvida por favor encaminhar uma mensagem pelo WhatsApp ou pelos comentários do repositório.
