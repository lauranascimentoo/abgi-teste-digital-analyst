# Sistema de Gerenciamento de Softwares 📦 
A solução foi desenvolvida utilizando o framework **Laravel 12** integrado com **Livewire**, proporcionando uma experiência reativa sem necessidade de JavaScript explícito. A aplicação implementa um CRUD completo para o gerenciamento de softwares, com persistência em banco de dados **SQL Server**. 

## Funcionalidades ⚙️
- Cadastro de novos softwares
- Edição de softwares existentes
- Exclusão com modal de confirmação
- Busca por nome
- Filtro por status (Ativo/Inativo)
- Paginação personalizável (10, 25, 50 por página)
- Ordenação padrão por nome (ASC)
- Indicador de carregamento com `wire:loading`
- Interface com Bootstrap

## Tecnologias Utilizadas 👩‍💻
- Laravel 12
- Livewire
- PHP 8.3
- SQL Server 2022
- Bootstrap 5

## Funcionamento 🧠
A lógica de funcionamento do sistema é centrada no componente **Livewire Lista**, que gerencia o estado da interface e todas as ações do usuário em tempo real. Ao iniciar, o sistema carrega todos os registros da tabela de softwares com base em filtros aplicáveis: texto buscado, status (Ativo/Inativo) e quantidade por página. O usuário pode acionar o botão "Novo" para abrir um formulário dinâmico de cadastro, ou clicar em "Editar" para preencher o mesmo formulário com os dados existentes. A submissão executa validações e grava ou atualiza os dados no banco de dados. A exclusão de um item é feita mediante confirmação via modal. Todos os dados são atualizados em tempo real, sem recarregar a página, aproveitando os recursos do Livewire para manter a sincronização com o estado do backend. A paginação e os filtros são integrados diretamente à consulta de dados, otimizando a performance e usabilidade.

## Rodando o projeto 🖥️
- Clone o repositório:
```shell
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```
- Instale as dependências PHP com o Composer:
```shell
composer install
```
- Copie o arquivo .env de exemplo:
```shell
cp .env.example .env
```
- Configure o arquivo .env com suas credenciais de banco de dados:
```php
DB_CONNECTION=sqlsrv
DB_HOST=127.0.0.1
DB_PORT=1433
DB_DATABASE=nome_do_banco
DB_USERNAME=root
DB_PASSWORD=senha
```
- Gere a chave da aplicação e rode as migrações para criar as tabela:
```shell
php artisan key:generate
php artisan migrate
```
- Inicie o servidor local:
```shell
php artisan serve
```
- Acesse o sistema no navegador:
```arduino
http://localhost:8000
```

## Melhorias 📈
Como este é meu primeiro projeto utilizando Laravel e Livewire, a solução representa uma base funcional e eficiente para gerenciamento de softwares e para executar os requisitos básicos, mas há diversos pontos de melhoria que podem ser implementados para evolução técnica e de usabilidade. 
- A **modularização do código**, separando responsabilidades de forma mais clara entre componentes, serviços e validações para facilitar a manutenção e o reuso. Por ser minha primeira experiência, optei por manter todas as descrições e implementações dentro de um mesmo código para facilitar o seguimento lógico do projeto.
- O **layout** pode ser aprimorado com o uso de frameworks mais modernos de front-end como Tailwind CSS com componentes visuais mais acessíveis e responsivos.
- A **validação dos dados** pode ser reforçada com mensagens mais contextuais e feedback visual aprimorado, além de validações mais apuradas para garantir que as informações preenchidas tem sentido lógico.
- A **integração do sistema com autenticação e permissões**, garantindo que apenas usuários autorizados possam editar ou excluir registros.

Além de funcionalidades adicionais como exportação de dados oara base excel, ordenação por colunas e suporte a múltiplos idiomas tornariam o sistema ainda mais robusto.
