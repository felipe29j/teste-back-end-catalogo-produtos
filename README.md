## Instalação

Siga os passos abaixo para instalar o projeto em seu ambiente local:

# 1. Clone o repositório

   Primeiro, você precisa clonar o repositório para sua máquina local. Abra um terminal e execute o seguinte comando:

   git clone https://github.com/felipe29j/teste-back-end-catalogo-produtos.git


# 2. Acesse o diretório do projeto

Navegue até o diretório do projeto que você acabou de clonar:

cd teste-back-end-catalogo-produtos

agora abra o terminal.

# 3. Instale as dependências

Certifique-se de ter o Composer instalado em sua máquina. Em seguida, execute o comando abaixo para instalar todas as dependências do projeto:

composer install

npm install

npm run dev

e abra um novo terminal

# 4. Configure o ambiente

Renomeie o arquivo .env.example para .env. Este arquivo contém as variáveis de ambiente necessárias para o projeto. Você pode fazer isso com o seguinte comando:

cp .env.example .env

Ou, se você estiver em um sistema Windows, use:

rename .env.example .env

# 5. Edite o arquivo .env

Abra o arquivo .env em um editor de texto e configure as variáveis de ambiente de acordo com seu ambiente de desenvolvimento

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=nome_do_seu_banco_de_dados

DB_USERNAME=seu_usuario

DB_PASSWORD=sua_senha

Nota: Certifique-se de criar o banco de dados especificado no seu servidor de banco de dados antes de prosseguir.

# 6. Gere a chave da aplicação

Execute o comando abaixo para gerar a chave da aplicação. Esta chave é necessária para a criptografia de dados e para a segurança da aplicação:

php artisan key:generate

# 7. Execute as migrações do banco de dados

Para criar as tabelas necessárias no banco de dados, execute o comando:

php artisan migrate --seed

# 8. Inicie o servidor de desenvolvimento

Para iniciar o servidor local, execute o seguinte comando:

php artisan serve

O servidor estará disponível em http://localhost:8000.