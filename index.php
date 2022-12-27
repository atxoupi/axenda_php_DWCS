<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tarefa Unidade 2</title>
    <link rel="stylesheet" type="text/css" href="styles/stylos.css">
</head>
<body>
<?php
    if(isset($_POST['nome']) && $_POST['nome']==''){
        echo "O nome é Obrigatorio!!!";
    }
?>
<h3 id="titulo">Axenda</h3>
<fieldset>
<legend>Axenda</legend>
<div id="contenedor">
<table id="tabla" align="center" border="1" cellpadding="2" cellspacing="2">
        <tbody id="encabezado">
            <td>Nome</td>
            <td>Teléfono</td>
        </tbody>
<?php
    if(isset($_POST['axenda'])) {
        $axenda = $_POST['axenda'];
    } else {
        $axenda=[];
    }
    
    if(isset($_POST['enviar'])){
        $nomeFormat=ucwords(trim($_POST['nome']));
        if($_POST['telefono']=='' && array_key_exists($nomeFormat, $axenda)){
            unset($axenda[$nomeFormat]);
        }
        else{
            $axenda [$nomeFormat] = $_POST['telefono'];
        }
        foreach($axenda as $nome=>$telefono){
            echo "<tr>";
            echo "<td>$nome</td>";
            echo "<td>$telefono</td>";
            echo "<tr>";
        }
        
    }
    

    if(isset($_POST['limpar'])){
        unset($axenda);
    }
  
?>
</table>
</div>
</fieldset>
<fieldset>
    <legend>Novo Contacto</legend>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <?php 
            foreach($axenda as $nome => $telefono){
                if($nome!=''){
                    echo "<input type='hidden' name='axenda[$nome]' value='$telefono'>";
                }
            }
        ?>
        <input type="text" name="nome" placeholder="Nome"><br><br>
        <input type="tel" name="telefono" placeholder="Teléfono" name="telefono"><br><br>
        <input id="enviar" type="submit" value="Añadir contacto" name="enviar">&nbsp;&nbsp;
        <input id="limpar" type="reset" value="Limpiar campos">
    </form>
</fieldset>
<?php
    if(isset($axenda) && count($axenda)>0){
        echo "<fieldset style='width:50%; margin:auto'>";
        echo "<legend>Vaciar Agenda</legend>";
        echo "<form action=''>";
        echo "<button id='vaciar' type='submit' name='limpar' value='1'>Vaciar</button>";
        echo "</form>";
    }
?>
</body>
</html>