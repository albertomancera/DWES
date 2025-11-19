<?php
// Ejercicio 5 - Validación de email y documentos (DNI / NIE / TIE)
// Esta página contiene un formulario con validación en JavaScript y comprobación
// básica en PHP al enviar. Las comprobaciones JS incluyen:
// - Email con expresión regular básica
// - DNI: 8 dígitos + letra, letra comprobada por algoritmo oficial
// - NIE: empieza por X/Y/Z, 7 dígitos y letra; se valida traduciendo la letra inicial
// - TIE: NIE válido + número de soporte que empieza por 'E' seguido de 8 dígitos

// Procesamiento servidor: validación mínima y eco de los valores (no sustituye a la JS)
$serverErrors = [];
$submitted = false;
$out = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$submitted = true;
	$email = isset($_POST['email']) ? trim($_POST['email']) : '';
	$docType = isset($_POST['docType']) ? $_POST['docType'] : '';
	$docValue = isset($_POST['docValue']) ? strtoupper(trim($_POST['docValue'])) : '';
	$tieSupport = isset($_POST['tieSupport']) ? strtoupper(trim($_POST['tieSupport'])) : '';

	// Simple server email check
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
		$serverErrors[] = 'Email no válido.';
	}

	// Server-side document checks (basic): use same logic as JS
	function checkDNI($dni) {
		$dni = strtoupper($dni);
		if (!preg_match('/^(\d{8})([A-Z])$/', $dni, $m)) return false;
		$letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
		$num = intval($m[1]);
		$expected = $letters[$num % 23];
		return ($expected === $m[2]);
	}
	function checkNIE($nie) {
		$nie = strtoupper($nie);
		if (!preg_match('/^[XYZ]\d{7}[A-Z]$/', $nie)) return false;
		$prefix = $nie[0];
		$map = ['X' => '0', 'Y' => '1', 'Z' => '2'];
		$body = $map[$prefix] . substr($nie, 1, 7);
		$letters = 'TRWAGMYFPDXBNJZSQVHLCKE';
		$num = intval($body);
		$expected = $letters[$num % 23];
		return ($expected === $nie[8]);
	}

	if ($docType === 'DNI') {
		if (!checkDNI($docValue)) $serverErrors[] = 'DNI no válido.';
	} elseif ($docType === 'NIE') {
		if (!checkNIE($docValue)) $serverErrors[] = 'NIE no válido.';
	} elseif ($docType === 'TIE') {
		// For TIE we expect a NIE value and a support number starting with E + 8 digits
		if (!checkNIE($docValue)) $serverErrors[] = 'NIE (parte del TIE) no válido.';
		if (!preg_match('/^E\d{8}$/', $tieSupport)) $serverErrors[] = 'Número de soporte TIE no válido (E seguido de 8 dígitos).';
	} else {
		$serverErrors[] = 'Tipo de documento desconocido.';
	}

	if (empty($serverErrors)) {
		$out = [
			'email' => $email,
			'docType' => $docType,
			'docValue' => $docValue,
			'tieSupport' => $tieSupport
		];
	}
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Ejercicio 5 - Validación Email y Documento</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
	<style>body{background:#f8f9fa;} .center{max-width:720px;margin:30px auto;} .muted{color:#6c757d;}</style>
</head>
<body>
	<main class="container center">
		<div class="card shadow-sm">
			<div class="card-body">
				<h3 class="mb-3">Validación de Email y Documento de identidad</h3>
				<p class="muted">Se valida en el cliente (JS) y de forma básica en el servidor (PHP).</p>

				<?php if ($submitted && !empty($serverErrors)) { ?>
					<div class="alert alert-danger">
						<ul class="mb-0">
							<?php foreach ($serverErrors as $e) echo '<li>' . htmlspecialchars($e) . '</li>'; ?>
						</ul>
					</div>
				<?php } elseif ($out) { ?>
					<div class="alert alert-success">
						<strong>Envío válido.</strong>
						<div>Email: <?php echo htmlspecialchars($out['email']); ?></div>
						<div>Documento: <?php echo htmlspecialchars($out['docType']) . ' — ' . htmlspecialchars($out['docValue']); ?></div>
						<?php if ($out['docType'] === 'TIE') echo '<div>Soporte: ' . htmlspecialchars($out['tieSupport']) . '</div>'; ?>
					</div>
				<?php } ?>

				<form id="formDoc" method="post" novalidate>
					<div class="mb-3">
						<label for="email" class="form-label">Email</label>
						<input type="email" id="email" name="email" class="form-control" required>
						<div class="form-text">Introduce un email válido (se valida en JS).</div>
					</div>

					<div class="mb-3">
						<label for="docType" class="form-label">Tipo de documento</label>
						<select id="docType" name="docType" class="form-select">
							<option value="DNI">DNI</option>
							<option value="NIE">NIE</option>
							<option value="TIE">TIE</option>
						</select>
					</div>

					<div class="mb-3" id="docValueGroup">
						<label for="docValue" class="form-label">Documento (DNI/NIE)</label>
						<input type="text" id="docValue" name="docValue" class="form-control" placeholder="Ej. 12345678Z o X1234567L" required>
						<div class="form-text">DNI: 8 dígitos + letra. NIE: X/Y/Z + 7 dígitos + letra.</div>
					</div>

					<div class="mb-3 d-none" id="tieSupportGroup">
						<label for="tieSupport" class="form-label">Número de soporte (TIE)</label>
						<input type="text" id="tieSupport" name="tieSupport" class="form-control" placeholder="E00235566">
						<div class="form-text">Empieza por 'E' seguido de 8 dígitos.</div>
					</div>

					<div id="jsErrors" class="mb-3"></div>

					<button type="submit" class="btn btn-primary">Comprobar y enviar</button>
				</form>
			</div>
		</div>
	</main>

	<script>
	// Mapeo letters for DNI/NIE
	const dniLetters = 'TRWAGMYFPDXBNJZSQVHLCKE';

	// Utility: compute control letter for a number (used for DNI/NIE)
	function controlLetterFromNumber(num) {
		return dniLetters.charAt(num % 23);
	}

	// Validate email with simple regex
	function validEmail(email) {
		const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
		return re.test(email);
	}

	// Validate DNI: 8 digits + letter and letter matches
	function validDNI(dni) {
		dni = dni.toUpperCase();
		const m = dni.match(/^(\d{8})([A-Z])$/);
		if (!m) return false;
		const num = parseInt(m[1], 10);
		const letter = m[2];
		return controlLetterFromNumber(num) === letter;
	}

	// Validate NIE: X/Y/Z + 7 digits + letter
	function validNIE(nie) {
		nie = nie.toUpperCase();
		const m = nie.match(/^([XYZ])(\d{7})([A-Z])$/);
		if (!m) return false;
		const prefix = m[1];
		const digits = m[2];
		const letter = m[3];
		const map = { 'X': '0', 'Y': '1', 'Z': '2' };
		const num = parseInt(map[prefix] + digits, 10);
		return controlLetterFromNumber(num) === letter;
	}

	// Validate TIE support number: E + 8 digits
	function validTIESupport(s) {
		return /^E\d{8}$/.test(s.toUpperCase());
	}

	// UI logic: show/hide support field for TIE
	const docTypeEl = document.getElementById('docType');
	const tieGroup = document.getElementById('tieSupportGroup');
	const docValueLabel = document.querySelector('label[for="docValue"]');
	function updateDocFields() {
		const type = docTypeEl.value;
		if (type === 'TIE') {
			tieGroup.classList.remove('d-none');
			docValueLabel.textContent = 'NIE (parte del TIE)';
		} else if (type === 'NIE') {
			tieGroup.classList.add('d-none');
			docValueLabel.textContent = 'NIE';
		} else {
			tieGroup.classList.add('d-none');
			docValueLabel.textContent = 'DNI';
		}
	}
	docTypeEl.addEventListener('change', updateDocFields);
	updateDocFields();

	// Form submit validation
	document.getElementById('formDoc').addEventListener('submit', function(e) {
		const errors = [];
		const email = document.getElementById('email').value.trim();
		const type = docTypeEl.value;
		const docValue = document.getElementById('docValue').value.trim().toUpperCase();
		const tieSupport = document.getElementById('tieSupport').value.trim().toUpperCase();

		if (!validEmail(email)) errors.push('Email no válido.');

		if (type === 'DNI') {
			if (!validDNI(docValue)) errors.push('DNI no válido.');
		} else if (type === 'NIE') {
			if (!validNIE(docValue)) errors.push('NIE no válido.');
		} else if (type === 'TIE') {
			if (!validNIE(docValue)) errors.push('NIE (parte del TIE) no válido.');
			if (!validTIESupport(tieSupport)) errors.push('Número de soporte TIE no válido (E + 8 dígitos).');
		}

		const jsErrors = document.getElementById('jsErrors');
		jsErrors.innerHTML = '';
		if (errors.length) {
			e.preventDefault();
			const div = document.createElement('div');
			div.className = 'alert alert-danger';
			const ul = document.createElement('ul');
			errors.forEach(function(m){ const li = document.createElement('li'); li.textContent = m; ul.appendChild(li); });
			div.appendChild(ul);
			jsErrors.appendChild(div);
			window.scrollTo({ top: jsErrors.offsetTop - 20, behavior: 'smooth' });
		}
		// if no errors, allow submit; server will perform basic checks too
	});
	</script>
</body>
</html>

