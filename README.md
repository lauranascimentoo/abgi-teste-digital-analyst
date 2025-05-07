# 📦 Software Manager - Laravel Livewire App

Sistema de gerenciamento de softwares desenvolvido em **Laravel** com **Livewire**, com recursos completos de listagem, criação, edição, exclusão, busca, filtro e paginação.

## 🚀 Funcionalidades
- Cadastro de novos softwares
- Edição de softwares existentes
- Exclusão com modal de confirmação
- Busca por nome com Enter
- Filtro por status (Ativo/Inativo)
- Paginação (10, 25, 50 por página)
- Ordenação por nome (ASC)
- Indicador de carregamento com `wire:loading`
- Interface com Bootstrap

## 🛠️ Tecnologias Utilizadas
- Laravel 12
- Livewire
- PHP 8.3
- SQL Server 2022
- Bootstrap 5

## 🧩 Requisitos

| #  | Requisito         | Detalhes                                     |
|----|-------------------|----------------------------------------------|
| 1  | Listagem          | Tabela Bootstrap padrão. Ordenado por nome ASC |
| 2  | Busca por texto   | Campo “nome” (pressionar Enter para buscar) |
| 3  | Filtro por status | Dropdown com opções Ativo/Inativo           |
| 4  | Paginação         | 10 por página (default), com seletor 10 / 25 / 50 |
| 5  | Loading           | wire:loading visível durante ações          |

