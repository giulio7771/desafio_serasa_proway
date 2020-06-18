Projeto feito em Php com o framework Laravel<br>
<br>
Ambiente:<br>
    git<br>
    Laradock<br>

O projeto pode ser executado a partir de qualquer servidor Php 5+ que rode Laravel. Eu utilizei o ambiente como conteiners docker Laradock, que possuem toda infraestrutura que precisamos. Tenha em mente que configurar o ambiente para esta aplicação pode ser trabalhoso e levar mais de uma hora.
<br>
Para instalar o laradock no Ubuntu sugiro esse tutorial: 
<br>
https://medium.com/@thicolares/como-configurar-um-ambiente-completo-php-nginx-mysql-e-phpmyadmin-para-projetos-laravel-usando-99954285351e
<br>
<br>
Setup<br>
<br>
Tendo o projeto clonado, laradock instalado, configurado (vide tutorial), e os containers rodando (docker-compose up -d nginx mysql), atualize o arquivo .env para apontar para o banco serasa que será criado:<br>
<br>
DB_CONNECTION=mysql<br>
DB_HOST=laradock_mysql_1<br>
DB_PORT=3306<br>
DB_DATABASE=serasa<br>
DB_USERNAME=root<br>
DB_PASSWORD=root<br>
<br>
Crie o banco de dados "serasa" no servidor MySQL do Laradock.<br> 
<br>
Entre no container do laradock: <br>
<h5>docker exec -it laradock_workspace_1 bash</h5>
<br>
Caminhe até o diretório raiz do projeto. Depende de como você estrutura o esquema de pastas, no meu caso fica em /var/www/projects/serasa:
<h5>cd projects/serasa</h5>
Então execute a migração e o semeamento com:<br>
<h5>php artisan migrate --seed</h5>
<br>
Se tudo deu certo até aqui, o projeto já deve estar rodando! :v<br>
<br>
Nessa aplicação temos três end-points nas Controllers localizadas em: app\Http\Controllers<br>
<br>
Na EmpresaController temos dois end-points:<br>
-all: Recupera todas as empresas ordenas pela pontuação, e devolve os dados pertinentes para a listagem usando EmpresaResource como DTO.<br>
-get: Retorna a empresa com o id especificado.<br>
<br>
Na ContabilidadeEmpresaController temos um end-point:<br>
-importarArquivoDadosFinanceiros: Chama o serviço de EmpresaProvider para realizar o registro das novas movimentações, bem como calcular a nova pontuação<br>
<br>
<br>
As regras de negócio estão em App\Services, onde também se encontra a implementação interface.



