<?php require_once APP_PATH.'/views/inc/header.php'; ?>

<a href="<?php echo URL_PATH ?>" class="btn btn-light addReturn">Regresar</a>

<div class="card card-body bg-light mt-5">

    <form class="form" action="<?php URL_PATH.'paginas/agregar'?>" method="post">
        <div class="form-group">
            <label  for="nombre">Ingresa el nombre del Usuario:</label>
            <input class="form-control" type="text" name="nombre" value="<?php $data['nombre']; ?>">
        </div>
        <div class="form-group">
          <label  for="email">Ingresa el email del Usuario:</label>
          <input class="form-control" type="text" name="email" value="<?php $data['email']; ?>">
        </div>
        <div class="form-group">
          <label for="telefono">Ingresa el Teléfono del Usuario:</label>
          <input class="form-control" type="text" name="telefono" value="<?php $data['telefono']; ?>">
        </div>
        <div class="form-group compcenter">
          <button class="btn btn-success" onclick="submit()">ENVIAR</button>
        </div>
    </form>
</div>

<?php if (isset($data['verificacion'])): ?>
<?php $ver = $data['verificacion']; ?>
  <div class="card card-body border-<?php echo $ver; ?> resp">
  <h3 class="text-<?php echo $ver; ?>"><?php echo $data['mensaje']; ?></h3>
  <div class="icon-<?php echo $ver;?> text-<?php echo $ver;?>"></div> 



  </div>
<?php endif; ?>



<?php require_once APP_PATH.'/views/inc/footer.php'; ?>
