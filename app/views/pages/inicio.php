      <?php require_once APP_PATH.'/views/inc/header.php'; ?>

      <?php

      function llenarTabla($datos){

      $resp = "";

      foreach ($datos as $valor) {
        $resp .= "<tr>";
        $resp .= "<td>$valor->id_usuario</td>";
        $resp .= "<td>$valor->nombre_usuario</td>";
        $resp .= "<td>$valor->email_usuario</td>";
        $resp .= "<td>$valor->telefono_usuario</td>";
        $resp .= "<td class='acciones'><a href='".URL_PATH."paginas/editar/".$valor->id_usuario."'>Editar</a>";
        $resp .= "<a href='".URL_PATH."paginas/borrar/".$valor->id_usuario."'>Borrar</a></td>";
        $resp .= "</tr>";
      }

      return $resp;

      } ?>

<table class="table">
  <thead>
  <tr>
    <th>Id</th>
    <th>Nombre</th>
    <th>Email</th>
    <th>Teléfono</th>
    <th>Acciones</th>
  </tr>
  </thead>
  <tbody>
    <?php echo llenarTabla($data['usuarios']); ?>
  </tbody>

</table>

<?php require_once APP_PATH.'/views/inc/footer.php'; ?>
