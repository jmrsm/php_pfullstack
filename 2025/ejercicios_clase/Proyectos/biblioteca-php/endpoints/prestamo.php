<?
require_once '../clases/prestamo.php';
header('Content-Type: application/json');

$prestamo = new Prestamo();

switch($_SERVER['REQUEST_METHOD']){
    case 'GET':
        echo json_encode($prestamo->listar());
        break;
    case 'POST':
        $data = json_decode(file_get_contents("php://input",true));
        $ok = $prestamo->registrar($data['id_usuario'],$data['id_librp']);
        echo json_encode(['success'=> $ok]);
        break;

    case 'PUT':
        $data = json_decode(file_get_contents("php://input",true));
        $ok = $prestamo->devolver($data['id_prestamo']);
        echo json_encode(['success'=> $ok]);
        break;
}
?>