<?php ob_start(); ?>
<!DOCTYPE html>
<html lang='pt-br'>
  <head>
    <meta charset='utf-8'>
    <title>Auditoria de Logins</title>
  </head>
<body>

<?php if ( ! isset( $_GET[ 'pdf' ] ) ): ?>
    <a href='?menu=audit_logins&pdf'>Gerar PDF</a>
<?php endif; ?>

  <table border='1'>
    <thead>
      <tr>
        <th>ID</th>
        <th>Nome Usuário</th>
        <th>Date e Hora</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach( $audits AS $a ): ?>
      <tr>
        <td><?php echo $a->getId(); ?></td>
        <td><?php echo $a->getNome(); ?></td>
        <td><?php echo $a->getDataHora(); ?></td>
      </tr>
      <?php endforeach; ?>
    </tbody>
  </table>

</body>
</html>

<?php
if ( isset( $_GET[ 'pdf' ] ) ) {
    // pega o conteudo do buffer, insere na variavel e limpa a memória
    $html = ob_get_clean();

    // converte o conteudo para uft-8
    $html = utf8_encode($html);

    // inclui a classe
    include 'inc/mpdf/MPDF57/mpdf.php';

    // cria o objeto
    $mpdf = new mPDF();

    // permite a conversao (opcional)
    $mpdf->allow_charset_conversion=true;
    // converte todo o PDF para utf-8
    $mpdf->charset_in='UTF-8';

    // escreve definitivamente o conteudo no PDF
    $mpdf->WriteHTML($html);

    // imprime
    $mpdf->Output();

    // finaliza o codigo
    exit();
}
?>

