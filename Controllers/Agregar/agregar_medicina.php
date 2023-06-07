proveedor: proveedor,
nombre: nombre,
categoria: categoria,
marca: marca,
preciouni: preciouni,
PrecioxCaja: PrecioxCaja,
UnidadxCaja: UnidadxCaja,
stock: stock
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $proveedor = $_POST['proveedor'];
    $nombre = $_POST['nombre'];
    $categoria = $_POST['categoria'];
    $marca = $_POST['marca'];
    $preciouni = $_POST['preciouni'];
    $PrecioxCaja = $_POST['PrecioxCaja'];
    $UnidadxCaja = $_POST['UnidadxCaja'];
    $stock = $_POST['stock'];

    require_once '../../conexion.php';

    $sql = "SELECT * FROM medicina WHERE Nombre = '$nombre'";
    $result = $conexion->query($sql);

    if ($result->num_rows > 0) {
        echo json_encode(array('error' => 1, 'mensaje' => 'El medicamento ya existe.'));
    } else {
        $insertSql = "INSERT INTO medicina(ID_proveedor, Nombre, ID_categoria, Marca, Precio_uni, Precio_caja, Unidad_caja, Stock, Estado) VALUES ('$proveedor','$nombre','$categoria','$marca','$preciouni','$PrecioxCaja','$UnidadxCaja','$stock','1')";

        if ($conexion->query($insertSql) === TRUE) {
            echo json_encode(array('error' => 2, 'mensaje' => 'Registro guardado correctamente.'));
        } else {
            echo json_encode(array('error' => 1, 'mensaje' => 'Error al guardar el registro: ' . $conexion->error));
        }
    }

    $conexion->close();
} else {
    echo json_encode(array('error' => 1, 'mensaje' => 'No se ha enviado ningún formulario.'));
}
