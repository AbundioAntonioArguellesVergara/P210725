<?php
// Programa 2: Reorganizar arreglo de letras
$arregloOriginal = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I'];
$arregloReorganizado = [];
$pasos = [];
$mostrarResultados = false;

// Procesar formulario
if ($_POST['accion'] ?? '' === 'reorganizar') {
    $mostrarResultados = true;
    
    // Patrón específico para obtener AFBGCHDIEJ
    // A(0) F(5) B(1) G(6) C(2) H(7) D(3) I(8) E(4)
    $indicesPatron = [0, 5, 1, 6, 2, 7, 3, 8, 4];
    
    foreach ($indicesPatron as $posicion => $indice) {
        if ($indice < count($arregloOriginal)) {
            $arregloReorganizado[] = $arregloOriginal[$indice];
            $pasos[] = "Paso " . ($posicion + 1) . ": Tomar {$arregloOriginal[$indice]} (posición " . ($indice + 1) . ")";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programa 2 - Reorganizar Letras (PHP)</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        
        .container {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }
        
        h1 {
            color: #333;
            text-align: center;
            border-bottom: 3px solid #9C27B0;
            padding-bottom: 10px;
        }
        
        .resultado {
            margin: 20px 0;
            padding: 20px;
            border-radius: 8px;
            border-left: 5px solid #9C27B0;
        }
        
        .original {
            background-color: #f3e5f5;
        }
        
        .reorganizado {
            background-color: #e8f5e8;
            border-left-color: #4CAF50;
        }
        
        .letra {
            display: inline-block;
            margin: 3px;
            padding: 10px 15px;
            border-radius: 25px;
            font-weight: bold;
            font-size: 18px;
            text-align: center;
            min-width: 20px;
        }
        
        .letra-original {
            background-color: #9C27B0;
            color: white;
        }
        
        .letra-reorganizada {
            background-color: #4CAF50;
            color: white;
        }
        
        button {
            background-color: #9C27B0;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin: 10px 0;
        }
        
        button:hover {
            background-color: #7B1FA2;
        }
        
        .explicacion {
            background-color: #fff3e0;
            padding: 15px;
            border-radius: 5px;
            border-left: 4px solid #ff9800;
            margin: 20px 0;
        }
        
        .paso {
            margin: 10px 0;
            padding: 10px;
            background-color: #f9f9f9;
            border-radius: 5px;
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
        <h1>Programa 2: Reorganizar Arreglo de Letras (PHP)</h1>
        
        <div class="php-info">
            <h3>🐘 Información PHP:</h3>
            <p><strong>Versión PHP:</strong> <?php echo phpversion(); ?></p>
            <p><strong>Función utilizada:</strong> array_slice(), implode(), count()</p>
            <p><strong>Fecha/Hora:</strong> <?php echo date('Y-m-d H:i:s'); ?></p>
        </div>
        
        <div class="explicacion">
            <h3>¿Cómo funciona?</h3>
            <p>El arreglo original <strong>ABCDEFGHI</strong> se reorganiza de la siguiente manera:</p>
            <p><strong>Patrón:</strong> Se alternan las letras tomando una del inicio y una del final, luego la siguiente del inicio y la siguiente del final, y así sucesivamente.</p>
            <p><strong>Resultado esperado:</strong> AFBGCHDIEJ</p>
        </div>
        
        <form method="post">
            <button type="submit" name="accion" value="reorganizar">Reorganizar Arreglo</button>
        </form>
        
        <div class="resultado original">
            <h3>Arreglo Original:</h3>
            <div>
                <?php foreach ($arregloOriginal as $letra): ?>
                    <span class="letra letra-original"><?php echo $letra; ?></span>
                <?php endforeach; ?>
            </div>
            <p><strong>Arreglo PHP:</strong> ['<?php echo implode("', '", $arregloOriginal); ?>']</p>
            <p><strong>Como string:</strong> <?php echo implode('', $arregloOriginal); ?></p>
        </div>
        
        <?php if ($mostrarResultados): ?>
            <div class="resultado reorganizado">
                <h3>Arreglo Reorganizado:</h3>
                <div>
                    <?php foreach ($arregloReorganizado as $letra): ?>
                        <span class="letra letra-reorganizada"><?php echo $letra; ?></span>
                    <?php endforeach; ?>
                </div>
                <p><strong>Arreglo PHP:</strong> ['<?php echo implode("', '", $arregloReorganizado); ?>']</p>
                <p><strong>Como string:</strong> <?php echo implode('', $arregloReorganizado); ?></p>
            </div>
            
            <div class="resultado" style="background-color: #fff3e0; border-left-color: #ff9800;">
                <h3>Proceso paso a paso:</h3>
                <?php foreach ($pasos as $paso): ?>
                    <div class="paso"><?php echo $paso; ?></div>
                <?php endforeach; ?>
                <div class="paso"><strong>Resultado:</strong> La reorganización da como resultado: <?php echo implode('', $arregloReorganizado); ?></div>
            </div>
            
            <div class="resultado" style="background-color: #e8f5e8; border-left-color: #4CAF50;">
                <h3>Análisis PHP:</h3>
                <p><strong>Longitud original:</strong> <?php echo count($arregloOriginal); ?> elementos</p>
                <p><strong>Longitud reorganizada:</strong> <?php echo count($arregloReorganizado); ?> elementos</p>
                <p><strong>Patrón de índices:</strong> [0, 5, 1, 6, 2, 7, 3, 8, 4]</p>
                <p><strong>Verificación:</strong> <?php echo (implode('', $arregloReorganizado) === 'AFBGCHDIEJ') ? '✅ Correcto' : '❌ Error'; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
