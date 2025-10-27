<?php
// Super-index de relaciones (DWES)
// Lista manual de carpetas de 'relacion' disponibles en el workspace
$relations = [
    ['id' => 1, 'title' => 'Relación 1', 'path' => 'relacion1/', 'description' => 'Ejercicios básicos de PHP (variables, formularios, arrays)'],
    ['id' => 2, 'title' => 'Relación 2', 'path' => 'relacion2/', 'description' => 'Ejerciones más avanzados y prácticas con Bootstrap'],
    ['id' => 3, 'title' => 'cursoPHP', 'path' => 'cursoPHP/', 'description' => 'Material complementario y ejemplos']
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Super-Index · DWES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        /* Layout to keep footer stuck to the bottom on short pages */
        html, body { height: 100%; }
        body { display: flex; flex-direction: column; min-height: 100vh; padding-top: 70px; }
        main { flex: 1 0 auto; }
        footer { margin-top: auto; }
        .card-rel { transition: transform .12s ease, box-shadow .12s ease; }
        .card-rel:hover { transform: translateY(-6px); box-shadow: 0 10px 30px rgba(2,6,23,0.08); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">DWES · Super-Index</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto">
                    <?php foreach ($relations as $r) { ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo $r['path']; ?>"><?php echo $r['title']; ?></a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container mt-4">
        <div class="row mb-4 align-items-center">
            <div class="col-md-8">
                <h1 class="h3">Índice de relaciones</h1>
                <p class="text-muted mb-0">Navega por las distintas relaciones de ejercicios. Esta página está formateada con Bootstrap 5.</p>
            </div>
            <div class="col-md-4 text-md-end">
                <a href="relacion1/" class="btn btn-outline-light btn-sm me-2">Ir a Relación 1</a>
                <a href="relacion2/" class="btn btn-light btn-sm">Ir a Relación 2</a>
            </div>
        </div>

        <div class="row g-4">
            <?php foreach ($relations as $r) { ?>
                <div class="col-md-4">
                    <div class="card card-rel h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><?php echo $r['title']; ?></h5>
                            <p class="card-text text-muted"><?php echo $r['description']; ?></p>
                            <div class="mt-auto">
                                <a href="<?php echo $r['path']; ?>" class="btn btn-primary btn-sm">Abrir</a>
                                <a href="<?php echo $r['path']; ?>index.html" class="btn btn-outline-secondary btn-sm ms-2">Index</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer class="bg-light py-4">
        <div class="container text-center small text-muted">© <?php echo date('Y'); ?> DWES · Super-Index — creado con Bootstrap 5</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
