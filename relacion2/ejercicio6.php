<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Ejercicio 6 - Listado de personas</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
	<div class="container py-4">
		<?php
		$personas = [
			['nombre' => 'Ana', 'apellido' => 'García', 'email' => 'ana.garcia@example.com', 'telefono' => '600123456', 'edad' => 28],
			['nombre' => 'Luis', 'apellido' => 'Pérez', 'email' => 'luis.perez@example.com', 'telefono' => '600234567', 'edad' => 35],
			['nombre' => 'María', 'apellido' => 'Rodríguez', 'email' => 'maria.rodriguez@example.com', 'telefono' => '600345678', 'edad' => 22],
			['nombre' => 'Carlos', 'apellido' => 'López', 'email' => 'carlos.lopez@example.com', 'telefono' => '600456789', 'edad' => 41],
			['nombre' => 'Sofía', 'apellido' => 'Martín', 'email' => 'sofia.martin@example.com', 'telefono' => '600567890', 'edad' => 30]
		];
		?>

		<div class="d-flex justify-content-between align-items-center mb-3">
			<h1 class="h4 m-0">Listado de personas</h1>
		</div>

		<div class="card mb-4">
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped table-hover table-sm align-middle">
						<thead class="table-light">
							<tr>
								<th>#</th>
								<th>Nombre</th>
								<th>Apellido</th>
								<th>Correo</th>
								<th>Teléfono</th>
								<th class="text-center">Edad</th>
							</tr>
						</thead>
						<tbody>
							<?php for ($i = 0; $i < count($personas); $i++) { 
                                $p = $personas[$i]; ?>
								<tr>
									<td><?php echo $i + 1; ?></td>
									<td><?php echo $p['nombre']; ?></td>
									<td><?php echo $p['apellido']; ?></td>
									<td><?php echo $p['email']; ?></td>
									<td><?php echo $p['telefono']; ?></td>
									<td class="text-center"><?php echo $p['edad']; ?></td>
								</tr>
							<?php } 
                            ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>
</html>

