<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style.css">
    <title>Registro de Visitas.</title>
</head>
<body>
    <header>
    <h1>Semana de Sistemas 2025</h1>
    <nav>
      <a href="/">Inicio</a>
      <a href="/dia/1">Día 1</a>
      <a href="/dia/2">Día 2</a>
      <a href="/dia/3">Día 3</a>
      <a href="/dia/4">Día 4</a>
      <a href="/dia/5">Día 5</a>
      <a href="/mi-info">Mi información</a>
      <a href="/visitas">Visitas</a>
    </nav>
  </header>

  <main>
    <h2>Formulario de Visitas</h2>
    <form action="/visitas/guardar" method="POST" class="formulario">
      <label>Nombre:</label>
      <input type="text" name="nombre" required>

      <label>Correo:</label>
      <input type="email" name="correo" required>

      <label>Comentario:</label>
      <textarea name="comentario" rows="2"></textarea>

      <button type="submit">Enviar visita</button>
    </form>

    <section class="lista-visitas">
      <h2>Visitas registradas</h2>
      <?php if (!empty($visitas)): ?>
        <?php foreach ($visitas as $v): ?>
          <div class="visita">
            <h3><strong><?php echo htmlspecialchars($v['nombre']); ?></strong> (<?php echo htmlspecialchars($v['correo']); ?>)</h3>
            <p><p>Comentario:</p><?php echo nl2br(htmlspecialchars($v['comentario'])); ?></p>
            <small><?php echo $v['fecha']; ?></small>
          </div>
        <?php endforeach; ?>
      <?php else: ?>
        <p>No hay visitas registradas aún.</p>
      <?php endif; ?>
    </section>
  </main>

</body>
</html>