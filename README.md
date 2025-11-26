# Desafio Hackaton - Backend
O Museu Sambaqui de Joinville está em processo de realocação do acervo daantiga reserva técnica (área sujeita a enchentes) para um novo edifício. Esse movimento motivou um inventário completo e a digitalização dos registros, modernizando informações produzidas ao longo de mais de 50 anos. O acervo “ex-situ”, hoje abrigado na reserva técnica, é estimado em cerca de 100 mil artefatos, que variam de pequenos fragmentos (cacos cerâmicos, ossos) a peças maiores (crânios humanos, vasos e outros).
Os artefatos estão organizados por coleções associadas a pesquisadores/colecionadores.
O trabalho de inventário consiste em conferir o acervo físico com registros históricos, principalmente:
Em suma, essa aplicação busca construir uma API para em conjunto com o frontend unificar, padronizar e agilizar oinventário, integrando cadastro, imagens, garantindo rastreamento, qualidade da informação e preservação digital do acervo do Museu Sambaqui.

## Pré-requisitos
*   PHP 8.1+
*   Composer
*   Node.js 16+

## Instalação

1.  Clone o repositório:
    ```bash
    git clone github.com
    cd seu-repositorio
    ```
2.  Instale as dependências do PHP:
    ```bash
    composer install
    ```
3.  Copie o arquivo de ambiente:
    ```bash
    cp .env.example .env
    ```
4.  Gere a chave da aplicação:
    ```bash
    php artisan key:generate
    ```
5.  Execute as migrações do banco de dados:
    ```bash
    php artisan migrate
    ```

## Uso

Para iniciar o servidor de desenvolvimento:
```bash
php artisan serve


