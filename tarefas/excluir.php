<?php require '../config/database.php';
$id = (int)($_GET['id'] ?? 0);
if ($id) {
    $q = $pdo->prepare('DELETE FROM tarefas WHERE id=?');
    $q->execute([$id]);
}
    
    if($id && !isset($_GET['ok'])) {
        exit("<script>location.href = confirm('Confirma a exclusão da tarefa?') ? 'excluir.php?id=$id&ok=1' : 'index.php';</script>");
    }

    if ($id) {
        $pdo->prepare('DELETE FROM tarefas WHERE id = ?')->execute([$id]);

}
header('Location: index.php');
exit;