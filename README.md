Projeto feito em Php com o framework Laravel<br>
<br>
Ambiente:<br>
    git<br>
    Laradock<br>

O projeto pode ser executado a partir de qualquer servidor Php 5+ que rode Laravel. Eu utilizei o ambiente os conteiners docker Laradock, que possuem o banco MySQL utilizado, servidor de aplicação nginx.
<br>
Para instalar o laradock no Ubuntu sugiro esse tutorial: https://medium.com/@thicolares/como-configurar-um-ambiente-completo-php-nginx-mysql-e-phpmyadmin-para-projetos-laravel-usando-99954285351e
<br>
<br>
Setup<br>
<br>
Tendo o projeto clonado, laradock instalado, configurado (vide tutorial), e os containers rodando (docker-compose up -d nginx mysql), crie o banco de dados "serasa" no servidor MySQL do Laradock.<br> 
Entre no container do laradock: <br>
<h5>docker exec -it laradock_workspace_1 bash</h5>
<br>
Caminhe até o diretório raiz do projeto. Depende de como você estrutura o esquema de pastas, no meu caso fica em /var/www/projects/serasa:
<h5>cd projects/serasa</h5>
Então executa a migração e o semeamento com:<br>
<h5>php artisan migrate --seed</h5>
