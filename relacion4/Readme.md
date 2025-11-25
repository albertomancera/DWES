# 🍪 Relación IV - Sesiones, Cookies, POO y JSON

Repositorio con la resolución de la **Relación IV de Ejercicios** para el módulo de **Desarrollo Web en Entorno Servidor** (IES Playamar).

Esta práctica profundiza en la persistencia de datos (Sesiones y Cookies), la Programación Orientada a Objetos (POO) avanzada y el manejo de formatos de intercambio de datos (JSON y Serialización).

## 📋 Listado de Ejercicios

### 🔹 Bloque 1: Sesiones y Cookies
- [ ] **Ejercicio 1:** Login Básico. Sistema de autenticación con `login.php` y `proceso.php`. Uso de Cookies (30s de vida) y Variables de Sesión para mantener al usuario identificado.
- [ ] **Ejercicio 2:** Persistencia de Variables. Formulario para aumentar/disminuir contadores (`num1`, `num2`) manteniendo el estado mediante `$_SESSION`. Incluye opciones para resetear y destruir sesión.
- [ ] **Ejercicio 3:** Juego Adivina (Hidden). Juego de "Adivina el número" (1-100) manteniendo el estado mediante campos ocultos (`<input type="hidden">`) en lugar de sesiones.
- [ ] **Ejercicio 4:** Juego Adivina (Sesiones). Versión mejorada del juego anterior utilizando `$_SESSION` para almacenar el número secreto y los intentos. Comparativa de seguridad/eficiencia.

### 🔹 Bloque 2: Programación Orientada a Objetos (POO)
- [ ] **Ejercicio 5:** Clase Restaurante. Definición de clase con atributos (`nombre`, `tipo`, `ratings`), constructor y métodos para calcular media de valoraciones.
- [ ] **Ejercicio 6:** Encapsulamiento y Estáticos. Refactorización de `Restaurante` usando **Promoción de Propiedades**, atributos privados (Getters/Setters) y propiedades estáticas (`numeroRest`) para contar instancias.
- [ ] **Ejercicio 7:** Clase Bandera. Lógica de objetos para comparar banderas, invertir colores y cambiar orientación (horizontal/vertical).
- [ ] **Ejercicio 8:** Clase CuentaBancaria. Gestión de saldo, depósitos, extracciones y transferencias con atributos privados.
- [ ] **Ejercicio 9:** Herencia y Abstracción. Clase abstracta `CuentaBancaria` y subclases `CuentaDebito` (sin descubierto) y `CuentaCredito` (con límite de descubierto).

### 🔹 Bloque 3: Interfaces y Polimorfismo
- [ ] **Ejercicio 10:** Interfaz Encendible. Implementación de la interfaz en clases dispares: `Bombilla` y `Motocicleta`. Uso de polimorfismo en la función `enciende_algo($objeto)`.

### 🔹 Bloque 4: Datos, JSON y Serialización
- [ ] **Ejercicio 11:** stdClass y Casting. Uso de objetos genéricos `stdClass` y conversión dinámica entre Arrays y Objetos (`(array)`, `(object)`).
- [ ] **Ejercicio 12:** Serialización. Persistencia de objetos complejos usando `serialize()` y `unserialize()` para guardarlos en cookies/sesión.
- [ ] **Ejercicio 13:** JSON Básico. Codificación y decodificación de datos de socios (`json_encode`, `json_decode`) transformando entre Arrays asociativos y Objetos.
- [ ] **Ejercicio 14:** Carrito de Compra (JSON + Cookies). Simulación de tienda online: el carrito se convierte a JSON, se guarda en una Cookie, y se recupera/decodifica en una segunda página.

### 🔹 Bloque 5: PHP Moderno y Modularidad
- [ ] **Ejercicio 15:** Tipado Estricto y Null Safety. Refactorización de los ejercicios de POO añadiendo tipos a parámetros/retornos y manejo de nulos (`?string`).
- [ ] **Ejercicio 16:** Namespaces y Require. Organización del código para evitar colisiones de nombres y gestión de dependencias con `require`.
- [ ] **Ejercicio 17:** Traits. Simulación de herencia múltiple y reutilización de código mediante Traits.

## 🛠️ Conceptos Clave

* **Persistencia:** `$_SESSION`, `setcookie()`, Inputs Hidden.
* **POO:** Clases, Herencia, Abstracción, Interfaces, `static`, Visibilidad.
* **Formatos:** Serialización PHP, JSON.
* **PHP Moderno:** Property Promotion, Typed Properties, Null Safety.

---
**Curso:** Desarrollo Web en Entorno Servidor