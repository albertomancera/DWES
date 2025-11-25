# 🧩 Relación III - Funciones, Recursividad y Arrays Avanzados

Repositorio con la resolución de la **Relación III de Ejercicios** para el módulo de **Desarrollo Web en Entorno Servidor** (IES Playamar).

El foco de esta práctica es la modularización del código mediante **funciones** (estándar, recursivas, anónimas y arrow functions), el uso intensivo de la **librería estándar de arrays y strings** de PHP, y la introducción a la **seguridad** en formularios.

## 📋 Listado de Ejercicios

### 🔹 Bloque 1: Funciones y Modularidad
- [ ] **Ejercicio 1:** Números Primos. Función `esPrimo($num)` para listar primos entre 1 y N.
- [ ] **Ejercicio 2:** Factorial Recursivo. Conversión del cálculo de factorial a función y creación de su versión recursiva.
- [ ] **Ejercicio 3:** Algoritmo de Euclides. Funciones para MCD y división entera (versiones iterativa y recursiva).
- [ ] **Ejercicio 4:** Librería Propia. Creación de `relacion3.php` para agrupar las funciones anteriores e invocarlas desde scripts externos.
- [ ] **Ejercicio 5:** Validación Documentos. Validación JS y PHP de documentos de identidad: **DNI** (algoritmo estándar), **NIE** y **TIE** (extranjeros).

### 🔹 Bloque 2: Strings y Algoritmos
- [ ] **Ejercicio 6:** Simulación Dados. Comparativa estadística entre un dado honesto y uno trucado (el 6 es 3x más probable).
- [ ] **Ejercicio 7:** Fechas. Funciones propias para mostrar días de la semana y meses en español.
- [ ] **Ejercicio 8:** Transformación Texto. Formulario para convertir texto a mayúsculas/minúsculas con validación de disyunción.
- [ ] **Ejercicio 9:** Palabra más larga. Algoritmo de extracción de la palabra de mayor longitud en un texto.
- [ ] **Ejercicio 10:** Inversión de Palabras. Mostrar el texto con el orden de las palabras invertido.
- [ ] **Ejercicio 11:** Swap. Función `swap($a, $b)` por referencia e inversión de arrays manual.

### 🔹 Bloque 3: Arrays y Funciones Nativas
- [ ] **Ejercicio 12:** Ordenación Burbuja. Implementación del algoritmo *Bubble Sort* usando paso por referencia.
- [ ] **Ejercicio 13:** Batería de Strings. Manipulación masiva: palíndromos, reverso, contadores y *hashing* (`md5`, `sha1`, `crypt`).
- [ ] **Ejercicio 14:** Funciones Anónimas. Cálculo de geometría (Círculo, Esfera) usando funciones asignadas a variables.
- [ ] **Ejercicio 15:** Arrow Functions. Refactorización del ejercicio anterior usando la sintaxis `fn() =>`.
- [ ] **Ejercicio 16:** Callbacks Básicos. Uso de `array_map`, `array_filter`, `array_walk` sobre un rango de números (1-100).
- [ ] **Ejercicio 17:** Arrays Avanzados. Operaciones de conjuntos (`intersect`, `diff`) y búsqueda (`find`, `any`) sobre arrays de pares y múltiplos.

### 🔹 Bloque 4: Lógica de Negocio y Seguridad
- [ ] **Ejercicio 18:** Generador de Menús. Arrays anidados para generar sugerencias de menú aleatorias en Cards de Bootstrap.
- [ ] **Ejercicio 19:** Probabilidad Ponderada. Versión avanzada del menú donde ciertos platos tienen más probabilidad de salir e incluyen imágenes.
- [ ] **Ejercicio 20:** Seguridad y Sanitización.
    - Uso de `htmlspecialchars()` en todos los `action` de formularios.
    - Implementación de `preg_match` (RegEx) y extensión `Filter` para sanitizar entradas de usuario y evitar XSS/Inyecciones.

## 🛠️ Conceptos Clave

* **Funciones:** Paso por valor vs referencia, recursividad, argumentos por defecto.
* **Tipos de Funciones:** Anónimas (Closures), Arrow Functions, Callbacks.
* **Arrays:** Manipulación avanzada (`array_map`, `array_reduce`, `array_filter`, `array_walk`).
* **Seguridad:** Sanitización de entrada (Input Validation) y salida (Output Escaping).

---
**Curso:** Desarrollo Web en Entorno Servidor