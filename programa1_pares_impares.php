<?php
// Inicializar sesión primero
session_start();

// Programa 1: Identificar números pares e impares
$arreglo = [];
$pares = [];
$impares = [];
$mostrarResultados = false;

// Procesar formulario
if ($_POST['accion'] ?? '' === 'generar') {
    // Generar arreglo de 10 elementos aleatorios
    for ($i = 0; $i < 10; $i++) {
        $arreglo[] = rand(1, 100);
    }
    $_SESSION['arreglo'] = $arreglo;
} elseif ($_POST['accion'] ?? '' === 'mostrar' && isset($_SESSION['arreglo'])) {
    $arreglo = $_SESSION['arreglo'];
    $mostrarResultados = true;
    
    // Clasificar números en pares e impares
    foreach ($arreglo as $numero) {
        if ($numero % 2 === 0) {
            $pares[] = $numero;
        } else {
            $impares[] = $numero;
        }
    }
}

// Cargar arreglo de la sesión si existe
if (empty($arreglo) && isset($_SESSION['arreglo'])) {
    $arreglo = $_SESSION['arreglo'];
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa 1 - Números Pares e Impares (PHP)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f0f0f0;
        }
        
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 3px solid #4CAF50;
            padding-bottom: 10px;
        }
        
        .resultado {
            margin: 20px 0;
            padding: 15px;
            border-radius: 5px;
        }
        
        .arreglo {
            background-color: #e3f2fd;
            border-left: 4px solid #2196F3;
        }
        
        .pares {
            background-color: #e8f5e8;
            border-left: 4px solid #4CAF50;
        }
        
        .impares {
            background-color: #fff3e0;
            border-left: 4px solid #ff9800;
        }
        
        .numero {
            display: inline-block;
            margin: 5px;
            padding: 8px 12px;
            border-radius: 20px;
            font-weight: bold;
        }
        
        .par {
            background-color: #4CAF50;
            color: white;
        }
        
        .impar {
            background-color: #ff9800;
            color: white;
        }
        
        .neutro {
            background-color: #2196F3;
            color: white;
        }
        
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 5px;
        }
        
        button:hover {
            background-color: #45a049;
        }
        
        .php-info {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #6c757d;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Programa 1: Identificar Números Pares e Impares (PHP)</h1>
        
        <div class="php-info">
            <h3>🐘 Información PHP:</h3>
            <p><strong>Versión PHP:</strong> <?php echo phpversion(); ?></p>
            <p><strong>Servidor:</strong> <?php echo $_SERVER['SERVER_SOFTWARE'] ?? 'No disponible'; ?></p>
            <p><strong>Fecha/Hora:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        
        <form method="post">
            <button type="submit" name="accion" value="generar">Generar Nuevo Arreglo</button>
            <?php if (!empty($arreglo)): ?>
                <button type="submit" name="accion" value="mostrar">Mostrar Pares e Impares</button>
            <?php endif; ?>
        </form>
        
        <?php if (!empty($arreglo)): ?>
            <div class="resultado arreglo">
                <h3>Arreglo Original:</h3>
                <div>
                    <?php foreach ($arreglo as $numero): ?>
                        <span class="numero neutro"><?php echo $numero; ?></span>
                    <?php endforeach; ?>
                </div>
                <p><strong>Elementos del arreglo PHP:</strong> [<?php echo implode(', ', $arreglo); ?>]</p>
            </div>
        <?php endif; ?>
        
        <?php if ($mostrarResultados): ?>
            <div class="resultado pares">
                <h3>Números Pares:</h3>
                <div>
                    <?php if (!empty($pares)): ?>
                        <?php foreach ($pares as $numero): ?>
                            <span class="numero par"><?php echo $numero; ?></span>
                        <?php endforeach; ?>
                        <p><strong>Total pares:</strong> <?php echo count($pares); ?> números</p>
                        <p><strong>Arreglo pares:</strong> [<?php echo implode(', ', $pares); ?>]</p>
                    <?php else: ?>
                        <p>No hay números pares en el arreglo.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="resultado impares">
                <h3>Números Impares:</h3>
                <div>
                    <?php if (!empty($impares)): ?>
                        <?php foreach ($impares as $numero): ?>
                            <span class="numero impar"><?php echo $numero; ?></span>
                        <?php endforeach; ?>
                        <p><strong>Total impares:</strong> <?php echo count($impares); ?> números</p>
                        <p><strong>Arreglo impares:</strong> [<?php echo implode(', ', $impares); ?>]</p>
                    <?php else: ?>
                        <p>No hay números impares en el arreglo.</p>
                    <?php endif; ?>
                </div>
            </div>
            
            <div class="resultado" style="background-color: #e8f5e8; border-left: 4px solid #4CAF50;">
                <h3>Análisis PHP:</h3>
                <p><strong>Total elementos:</strong> <?php echo count($arreglo); ?></p>
                <p><strong>Números pares:</strong> <?php echo count($pares); ?></p>
                <p><strong>Números impares:</strong> <?php echo count($impares); ?></p>
                <p><strong>Porcentaje pares:</strong> <?php echo round((count($pares) / count($arreglo)) * 100, 1); ?>%</p>
                <p><strong>Porcentaje impares:</strong> <?php echo round((count($impares) / count($arreglo)) * 100, 1); ?>%</p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
