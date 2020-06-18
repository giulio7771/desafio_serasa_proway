Projeto feito em Php com o framework Laravel<br>
<br>
Ambiente:<br>
    git<br>
    Laradock<br>

O projeto pode ser executado a partir de qualquer servidor Php 5+ que rode Laravel. Eu utilizei o ambiente como conteiners docker Laradock, que possuem toda infraestrutura que precisamos. Tenha em mente que configurar o ambiente para esta aplicação pode ser trabalhoso e levar mais de uma hora.
<br>
Para instalar o laradock no Ubuntu:
 1- clone o Laradock na pasta de sua escolha
git clone https://github.com/Laradock/laradock.git 

2- Entre na pasta do projeto e renomeio env-example para .env
cd laradock
cp env-example .env

3- Entre com permissão de adm e execute os containers básicos
sudo -s
docker-compose up -d nginx

4- Volte uma pasta e clone o projeto
cd ..
git clone https://github.com/giulio7771/desafio_serasa_proway.git

5- Entre no container de trabalho
docker exec -it laradock_workspace_1 bash

6- Entre na pasta do projeto altera a permissão de storage e cache:
cd desafio_serasa_proway
chmod -R 755 storage bootstrap/cache

7- Saia do bash e altere o dono da pasta do projeto:
exit
chmod -R 755 storage bootstrap/cache

8- Configure o dns local da aplicação:
cd laradock/nginx/sites/
cp laravel.conf.example serasa.conf
nano serasa.conf

9- No editor de texto altere a a linha 11 e 12 para ficarem da seguinte forma:
	server_name serasa.test
	root /var/www/desafio_serasa_proway/public
Para confirmar as alterações com o editor nano: ctrl + O, e para sair ctrl + x

10- Volte para a pasta do laradock e reinicie os containers:
cd ..
cd ..
docker-compose restart

11- Adicione o server_name no arquivo de hosts. Edite o arquivo /etc/hosts 
para conter a linha: 127.0.1.1 serasa.test
nano /etc/hosts
ctrl + o, ctrl + x

12- Configure o Banco de dados como consta no tutorial na medium:
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
Para executar os containers execute o comando abaixo no diretório raiz onde se encontra o clone do Laradock (sugiro executar 'sudo -s' antes para não ter problemas de permissão):<br>
<h5>docker-compose up -d nginx mysql</h5>
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
Na EmpresaController temos dois end-points:<br><br>
- all: Recupera todas as empresas ordenas pela pontuação, e devolve os dados pertinentes para a listagem usando EmpresaResource como DTO.<br>
- get: Retorna a empresa com o id especificado, também usando EmpresaResource.<br>
<br>
Na ContabilidadeEmpresaController temos um end-point:<br><br>
- importarArquivoDadosFinanceiros: Recebe o id da empresa, quantidade de notas e débitos importados. Chama o serviço de EmpresaProvider para realizar o registro das novas movimentações, bem como calcular e retornar a nova pontuação<br>
<br>
<br>
As regras de negócio estão em App\Services, onde for implementada a interface.
<br>
<br>
Os 4 testes desenvolvidos se encontram em tests\Feature.<br>
Para execução dos testes, execute o seguinte comando, estando dentro do container laradock_workspace_1, e dentro do diretório raiz do projeto:<br>
<h5>./vendor/bin/phpunit</h5>


