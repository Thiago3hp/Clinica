# Projeto-01

**Descrição**
- Projeto didático em PHP que demonstra organização com PSR-4, classes e uso de um banco SQLite.

**Requisitos**
- PHP 8+ instalado
- Composer instalado
- `sqlite3` disponível (para criar/inspecionar o banco)

## Instalação (composer)
1. No terminal, dentro da pasta do projeto, execute:

```bash
composer install
composer dump-autoload
```

2. Isso criará a pasta `vendor/` e carregará o autoloader PSR-4 configurado em `composer.json`.

## Configurar o banco de dados (SQLite)
O projeto usa um arquivo SQLite chamado `banco.sqlite` na raiz do projeto.

Crie o arquivo e a tabela `medicos` com os comandos abaixo:

```bash
touch banco.sqlite
sqlite3 banco.sqlite "CREATE TABLE medicos (id INTEGER PRIMARY KEY, crm TEXT NOT NULL, nome TEXT NOT NULL, especialidade TEXT NOT NULL);"
sqlite3 banco.sqlite "INSERT INTO medicos (crm,nome,especialidade) VALUES ('CRM/PI 24546','Luiz Lins','Oftomologista');"
```

> Observação: se você preferir, pode abrir o `sqlite3 banco.sqlite` e rodar os comandos SQL manualmente.

## Executando os scripts pelo terminal

- Rodar o exemplo principal (executa as classes e faz var_dump de uma consulta):

```bash
php index.php
```

- Recuperar e listar médicos (mostra nomes no terminal):

```bash
php recuperar-medicos.php
```

- Inserir médico (esse script contém um SQL de exemplo — ver nota abaixo):

```bash
php inserir-medico.php
```

## Observações importantes / Análise rápida do projeto
- O autoload PSR-4 está configurado em `composer.json` com o namespace `Luizlins\Projeto01\` apontando para `src/`.
- A conexão com o banco é feita em `conexao.php` usando SQLite: o arquivo esperado é `banco.sqlite` na raiz.
- Arquivos principais de exemplo: `index.php`, `recuperar-medicos.php`, `inserir-medico.php`.

> **Nota:** o arquivo `inserir-medico.php` contém um `INSERT` SQL com uma vírgula extra ao final do comando `VALUES(...) ,` — isso provavelmente causa um erro de sintaxe SQL. Recomendo ajustar para algo como:
>
> ```sql
> INSERT INTO medicos (id, crm, nome, especialidade) VALUES (6, 'CRM/PI 1234', 'Luiz Lins', 'Cardiologista');
> ```
>
> ou remover o `id` se quiser que o SQLite gere automaticamente o `id`:
>
> ```sql
> INSERT INTO medicos (crm, nome, especialidade) VALUES ('CRM/PI 1234', 'Luiz Lins', 'Cardiologista');
> ```

## Estrutura do projeto (resumo)
- `composer.json` — autoload PSR-4
- `vendor/` — dependências geradas pelo Composer
- `src/` — classes do projeto (`Configuracoes/Telefone.php`, `Modulos/Medico.php`, `Modulos/Paciente.php`, `Modulos/Consulta.php`)
- `index.php`, `recuperar-medicos.php`, `inserir-medico.php` — scripts de exemplo

## Próximos passos sugeridos
- Corrigir o SQL em `inserir-medico.php` (ver nota acima).
- Opcional: adicionar um pequeno script `setup.php` que cria `banco.sqlite` e popula dados iniciais automaticamente.

Se quiser, eu corrijo o `inserir-medico.php` e crio um `setup.php` para automatizar a criação do banco e inserção de dados.