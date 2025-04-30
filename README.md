# mi-api-tokens

## Instalación
1. Clonar: `git clone https://github.com/TU_USUARIO/mi-api-tokens.git`
2. Instalar dependencias: `composer install`
3. Configurar `.env` (DB_*, APP_KEY…)
4. Migrar y seedear: `php artisan migrate --seed`
5. Levantar servidor: `php artisan serve`

## Endpoints
- **GET** `/api/characters`
- **POST** `/api/characters`
- **GET** `/api/characters/{id}`
- **PUT/PATCH** `/api/characters/{id}`
- **DELETE** `/api/characters/{id}`
- **GET** `/api/media`
- …y similares para `/api/media`

**Autenticación**: Bearer Token (Laravel Sanctum).  

## Ejemplo cURL
```bash
curl -H "Authorization: Bearer TU_TOKEN" http://127.0.0.1:8000/api/characters
