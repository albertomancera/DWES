<?php
// Índice automático para la carpeta relacion2
// Escanea archivos .php/.html y subcarpetas y extrae una descripción heurística

function extract_description($path) {
    $text = @file_get_contents($path);
    if ($text === false) return '';

    // 1) Buscar primer <h1> o <h2>
    if (preg_match('/<h1[^>]*>(.*?)<\/h1>/is', $text, $m)) return trim(strip_tags($m[1]));
    if (preg_match('/<h2[^>]*>(.*?)<\/h2>/is', $text, $m)) return trim(strip_tags($m[1]));

    // 2) Comentarios HTML <!-- ... -->
    if (preg_match('/<!--\s*(.*?)\s*-->/s', $text, $m)) return trim(preg_replace('/\s+/', ' ', strip_tags($m[1])));

    // 3) Comentarios PHP /* ... */
    if (preg_match('/\/\*\s*(.*?)\s*\*\//s', $text, $m)) return trim(preg_replace('/\s+/', ' ', strip_tags($m[1])));

    // 4) Comentarios de línea PHP // o # en las primeras líneas
    $lines = preg_split('/\r?\n/', $text);
    $firstComments = [];
    for ($i = 0; $i < min(10, count($lines)); $i++) {
        $ln = trim($lines[$i]);
        if (preg_match('/^(\/\/|#)\s*(.*)$/', $ln, $m)) {
            $firstComments[] = $m[2];
        }
    }
    if (!empty($firstComments)) return trim(implode(' ', $firstComments));

    // 5) Buscar primeros textos dentro de etiquetas <p>
    if (preg_match('/<p[^>]*>(.*?)<\/p>/is', $text, $m)) return trim(strip_tags($m[1]));

    // 6) Buscar primer echo '...' o echo "..."
    if (preg_match('/echo\s+["\']([^"\']{5,200})["\']/i', $text, $m)) return trim($m[1]);

    // fallback: devolver primeras 120 chars sin etiquetas
    $clean = trim(strip_tags($text));
    $clean = preg_replace('/\s+/', ' ', $clean);
    return mb_substr($clean, 0, 120) . (mb_strlen($clean) > 120 ? '...' : '');
}

$items = [];
$dir = __DIR__;
$all = scandir($dir);
foreach ($all as $name) {
    if ($name === '.' || $name === '..') continue;
    // Skip the index itself and any hidden files
    if ($name === basename(__FILE__)) continue;

    $full = $dir . DIRECTORY_SEPARATOR . $name;
    if (is_dir($full)) {
        $items[] = ['type' => 'dir', 'name' => $name, 'path' => $name . '/'];
    } else {
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        if (in_array($ext, ['php', 'html', 'htm'])) {
            $desc = extract_description($full);
            $items[] = ['type' => 'file', 'name' => $name, 'path' => $name, 'desc' => $desc];
        }
    }
}

// Ordenar por tipo (dirs primero) y por nombre
usort($items, function($a, $b){
    if ($a['type'] === $b['type']) return strcasecmp($a['name'], $b['name']);
    return ($a['type'] === 'dir') ? -1 : 1;
});
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Relación 2 · Índice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        .card-rel { transition: transform .12s ease, box-shadow .12s ease; }
        .card-rel:hover { transform: translateY(-6px); box-shadow: 0 10px 30px rgba(2,6,23,0.08); }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="/DWES/super-index.php">DWES · Relación 2</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav" aria-controls="nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="nav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="/DWES/super-index.php">Super-Index</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <main class="container py-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h4 m-0">Relación 2 - Índice automático</h1>
            <p class="mb-0 text-muted">Archivos detectados: <?php echo count($items); ?></p>
        </div>

        <div class="row g-3">
            <?php foreach ($items as $it) { ?>
                <div class="col-md-6">
                    <div class="card card-rel h-100">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-1"><?php echo htmlspecialchars($it['name']); ?></h5>
                            <?php if ($it['type'] === 'dir') { ?>
                                <p class="text-muted small mb-3">Carpeta — contiene ejercicios o recursos.</p>
                                <div class="mt-auto">
                                    <a href="<?php echo $it['path']; ?>" class="btn btn-outline-primary btn-sm">Abrir carpeta</a>
                                </div>
                            <?php } else { ?>
                                <p class="text-muted mb-3"><?php echo $it['desc'] ? htmlspecialchars($it['desc']) : 'Sin descripción automática. Abre el archivo para editarla.'; ?></p>
                                <div class="mt-auto">
                                    <a href="<?php echo $it['path']; ?>" class="btn btn-primary btn-sm">Ver ejercicio</a>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>

    <footer class="bg-light py-3 mt-5">
        <div class="container text-center small text-muted">© <?php echo date('Y'); ?> DWES · Relación 2</div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>
