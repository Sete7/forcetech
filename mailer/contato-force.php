<?php

require_once './mailer/class.phpmailer.php';

$btnEnviar = filter_input(INPUT_POST, 'btnEnviar', FILTER_SANITIZE_STRING);
if ($btnEnviar):
    $nome = utf8_decode(strip_tags(trim($_POST['nome'])));
    $email = utf8_decode(strip_tags(trim($_POST['email'])));
    $assunto = utf8_decode(strip_tags(trim($_POST['assunto'])));
    $mensagem = filter_input(INPUT_POST, 'mensagem', FILTER_SANITIZE_STRING);
    
    try {
        $mailer = new PHPMailer();
        // DEFINIÇÃO DOS DADOS DE AUTENTICAÇÃO - Você deve auterar conforme o seu domínio!
        $mailer->IsSMTP(); // Define que a mensagem será SMTP
        $mailer->Host = "smtp.forcetech.com.br"; // Seu endereço de host SMTP
        $mailer->SMTPAuth = true; // Define que será utilizada a autenticação -  Mantenha o valor "true"
        $mailer->Port = 587; // Porta de comunicação SMTP - Mantenha o valor "587"
        $mailer->SMTPSecure = false; // Define se é utilizado SSL/TLS - Mantenha o valor "false"
        $mailer->SMTPAutoTLS = false; // Define se, por padrão, será utilizado TLS - Mantenha o valor "false"
        $mailer->Username = 'atendimento@forcetech.com.br'; // Conta de email existente e ativa em seu domínio
        $mailer->Password = ''; // Senha da sua conta de email
        // DADOS DO REMETENTE
        $mailer->Sender = "atendimento@forcetech.com.br"; // Conta de email existente e ativa em seu domínio
        $mailer->From = "atendimento@forcetech.com.br"; // Sua conta de email que será remetente da mensagem
        $mailer->FromName = "Forcetech"; // Nome da conta de email
        // DADOS DO DESTINATÁRIO
        $mailer->AddAddress('atendimento@forcetech.com.br', 'Forcetech'); // Define qual conta de email receberá a mensagem
        // Definição de HTML/codificação
        $mailer->IsHTML(true); // Define que o e-mail será enviado como HTML
        $mailer->CharSet = utf8_decode($mensagem);

        // DEFINIÇÃO DA MENSAGEM
        $mailer->Subject = "Formulario Contato"; // Assunto da mensagem
        $mailer->Body .= " Nome: " . $_POST['nome'] . "<br>"; // Texto da mensagem
        $mailer->Body .= " E-mail: " . $_POST['email'] . "<br>"; // Texto da mensagem
        $mailer->Body .= " Assunto: " . $_POST['assunto'] . "<br>"; // Texto da mensagem
        $mailer->Body .= " Mensagem: " . nl2br($_POST['mensagem']) . "<br>"; // Texto da mensagem    
        // ENVIO DO EMAIL
        $mailer->Send();
        // Exibe uma mensagem de resultado do envio (sucesso/erro)
        echo "<script>alert('Sr(a) $nome sua mensagem foi enviada com sucesso! Em breve entraremos em contato!');</script>";
        echo "<script>window.location = 'https://www.forcetech.com.br/contato'</script>";        
        // Limpa os destinatários e os anexos
        $mailer->ClearAllRecipients();
        // Exibe uma mensagem de resultado do envio (sucesso/erro)
    } catch (phpmailerException $e) {          
          echo "<script>alert('<b>Sr(a) $nome sua mensagem não pode ser enviada tente novamente mais tarde!</b>');</script>" . $e->getMessage();
    }
endif;
?>

<form class="form_contato" action="" method="POST">    
    <label for="nome">*NOME</label>
    <input type="text" name="nome" id="nome" required="">
    <label for="email">*EMAIL</label>
    <input type="email" name="email" id="email" required="">
    <label for="assunto">*ASSUNTO</label>
    <input type="text" name="assunto" id="assunto" required="">
    <label for="msg">*MENSAGEM</label>
    <textarea id="msg" name="mensagem" class="textContato" rows="5" cols="20" required=""></textarea>
    <input type="submit" class="btn btn-green" name="btnEnviar" value="ENVIAR">
</form> 
