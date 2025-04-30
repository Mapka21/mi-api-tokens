
# mi-api-tokens

API RESTful construida con Laravel, que permite gestionar personajes y medios (películas/series). Incluye autenticación mediante tokens personales con Laravel Sanctum.

---

## 🚀 Instalación

1. Clona el repositorio:  
   ```bash
   git clone https://github.com/Mapka21/mi-api-tokens.git
   cd mi-api-tokens
   ```

2. Instala dependencias:  
   ```bash
   composer install
   ```

3. Copia y configura el archivo `.env`:  
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. Configura tu base de datos en el archivo `.env`, luego ejecuta:  
   ```bash
   php artisan migrate --seed
   ```

5. Levanta el servidor de desarrollo:  
   ```bash
   php artisan serve
   ```

---

## 🔐 Autenticación

Esta API utiliza **Laravel Sanctum** para autenticación. Para acceder a los endpoints protegidos, necesitas un token personal (Personal Access Token).

Puedes generar uno en Tinker:

```bash
php artisan tinker
>>> $user = App\Models\User::first();
>>> $token = $user->createToken('mi-token')->plainTextToken;
```

Luego, usa ese token como _Bearer Token_ en Postman o en cURL.

---

## 📚 Endpoints disponibles

### Characters

- `GET /api/characters` – Lista todos los personajes
- `POST /api/characters` – Crea un personaje
- `GET /api/characters/{id}` – Muestra un personaje específico
- `PUT /api/characters/{id}` – Actualiza un personaje
- `DELETE /api/characters/{id}` – Elimina un personaje

### Media

- `GET /api/media` – Lista todas las películas/series
- `POST /api/media` – Crea una película/serie
- `GET /api/media/{id}` – Muestra una película/serie
- `PUT /api/media/{id}` – Actualiza una película/serie
- `DELETE /api/media/{id}` – Elimina una película/serie

---

## 🧪 Ejemplo de cURL

```bash
curl -X GET http://127.0.0.1:8000/api/characters \
  -H "Authorization: Bearer TU_TOKEN_AQUI" \
  -H "Accept: application/json"
```

Para crear una película con personajes:

```bash
curl -X POST http://127.0.0.1:8000/api/media \
  -H "Authorization: Bearer TU_TOKEN_AQUI" \
  -H "Accept: application/json" \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Naruto the Movie",
    "classification": "Acción",
    "release_date": "2004-08-21",
    "review": "Primera película de Naruto.",
    "season": null,
    "character_ids": [1, 2, 3]
  }'
```

---

## 📸 Evidencias

Las evidencias del funcionamiento de esta API (uso en Postman, cURL, token, etc.) están disponibles en el documento de evidencias externo (PDF).

---

## 🧑 Autor

**Mapka21**  
[GitHub](https://github.com/Mapka21)

---
