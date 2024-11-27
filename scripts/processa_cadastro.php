<?php
include 'conexao.php';

$nome = $conexao->real_escape_string($_POST['nm_user']);
$email = $conexao->real_escape_string($_POST['email_user']);
$senha = $conexao->real_escape_string($_POST['password']);

// Validação da senha
$padrao = "/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";
if (!preg_match($padrao, $senha)) {
    echo "Erro: A senha deve ter pelo menos 8 caracteres, incluir uma letra maiúscula e um caractere especial.";
} else {
    $senhaCriptografada = password_hash($senha, PASSWORD_DEFAULT);

    // Verificar e-mail duplicado
    $sql = "SELECT * FROM usuarios WHERE email_user = '$email'";
    $result = $conexao->query($sql);

    if ($result->num_rows > 0) {
        echo "Erro: O e-mail já está cadastrado.";
    } else {
        $sql = "INSERT INTO usuarios (nm_user, email_user, password) VALUES ('$nome', '$email', '$senhaCriptografada')";
        if ($conexao->query($sql) === TRUE) {
            echo "Usuário cadastrado com sucesso!";
        } else {
            echo "Erro ao cadastrar usuário: " . $conexao->error;
        }
    }

    $conexao->close();
}
?>