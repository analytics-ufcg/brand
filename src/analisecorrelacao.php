<?php
if (file_exists('data.xml')) {
    $xml = simplexml_load_file('data.xml');
}

$analisada = "";
global $analisada;

$setores = [];
global $setores;

if (!empty($_POST["menu"])) {
	$analisada=$_POST["menu"];
}

if (!empty($_POST["sector"])) {
	foreach ($_POST["sector"] as $check){
		array_push($setores, $check);
	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<!-- fade window-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js"></script> 
<script type="text/javascript">

$(document).ready(function() {	

	$('a[name=modal]').click(function(e) {
		e.preventDefault();
		
		var id = $(this).attr('href');
	
		var maskHeight = $(document).height();
		var maskWidth = $(window).width();
	
		$('#mask').css({'width':maskWidth,'height':maskHeight});

		$('#mask').fadeIn(1000);	
		$('#mask').fadeTo("slow",0.8);	
	
		//Get the window height and width
		var winH = $(window).height();
		var winW = $(window).width();
              
		$(id).css('top',  winH/2-$(id).height()/2);
		$(id).css('left', winW/2-$(id).width()/2);
	
		$(id).fadeIn(2000); 
	
	});
	
	$('.window .close').click(function (e) {
		e.preventDefault();
		
		$('#mask').hide();
		$('.window').hide();
	});		
	
	$('#mask').click(function () {
		$(this).hide();
		$('.window').hide();
	});			
	
});
</script>

<meta charset="utf-8" />
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <link rel="stylesheet" href="/resources/demos/style.css" />
  <script>
  $(function() {
    $( "#tabs" ).tabs();
  });
  </script>
  
  <script>

	$(function(){

	marcar = function(elemento){
	elemento = $(elemento);
	elemento.prop("checked", true);
	}

	desmarcar = function(elemento){
	elemento = $(elemento);
	elemento.prop("checked", false);
	}

	});

	</script>
  
  
<style type="text/css">
<!--
body {
	background-color: #FFF;
	background-image: url(image/back.jpg);
	background-repeat: repeat-x;
}

	
-->
</style>

</head>

<body>

<table width="900" height="271" border="0" align="center">
  <tr>
    <td bgcolor="#FFFFFF">
			<table width="788" height="215" border="0" align="center">
			  <tr>
				<td width="225"><a href="index.php"><img src="image/logo06.png" width="225" height="82" border=0 /></a></td>
				<td width="56">&nbsp;</td>
				<td width="190">&nbsp;</td>
				<td width="71">&nbsp;</td>
				<td width="100"><a href="#janela1" name="modal">O que é o Brand?</a></td>
				<td colspan="2"><a href="#janela2" name="modal">Mais informações</a></td>
				</tr>
			  <tr>
				<td><img src="image/frh-analytics.png" width="147" height="45" /></td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td>&nbsp;</td>
				<td width="55">&nbsp;</td>
				<td width="61">&nbsp;</td>
			  </tr>
			  <tr>
				<td colspan="7">&nbsp;</td>
			  </tr>
			</table>

      <table width="600" height="450" border="0" align="center">
	<tr>
	  <td height="72" colspan="2">
	    <?php
				
				 foreach ($xml -> marca as $marca) {
					$info=$marca -> info;
					$logo=utf8_decode($marca -> imagem);
					$nome=$marca -> nome;

					if ($nome==$analisada) 
					{
						echo "<img src='".$logo."' width='100' height='100' /><br />
						".$info."";
					}
				 }
				
				?>
	    </td>	
	  </tr>	
	<tr>
	  <td colspan="2">
      <br />
	    <h2>Escolha por setor:</h2><br /> 
	   
	    </td>	
	  </tr>
	<tr>
	  <td width="296">
      
      		 <div class="tex">
		<form action="analisecorrelacao.php" method="post">
	      
		  <input type="checkbox" name="sector[]" value="alimentosebebidas" checked="checked">Setor alimentício
			  
				<p style="text-indent: 2em;"><input type="checkbox" name="sector[]" value="comidas">Comidas</p>
				<p style="text-indent: 2em;"><input type="checkbox" name="sector[]" value="bebidas" checked="checked">Bebidas</p>
				
	      <input type="checkbox" name="sector[]" value="petroleiro" checked="checked">Setor petroleiro<br>
		  <input type="checkbox" name="sector[]" value="energetico">Setor energético<br>
		  <input type="checkbox" name="sector[]" value="mineracao">Setor de mineração<br>
		  
		  <input type="checkbox" name="sector[]" value="tecnologico" checked="checked">Setor tecnológico
			<p style="text-indent: 2em;"><input type="checkbox" name="sector[]" value="eletronicos" checked="checked">Produtos eletrônicos</p>
			
	      <input type="checkbox" name="sector[]" value="comunicacao">Setor de comunicação
			<p style="text-indent: 2em;"><input type="checkbox" name="sector[]" value="redesocial">Rede social</p><br>
			
		
	    </div>
      
      </td>
	  <td width="294">
		<input type="button" onclick="marcar(':checkbox')" value="Marcar todos">
		<input type="button" onclick="desmarcar(':checkbox')" value="Desmarcar todos"><br />
		<label><input type="submit" value="Atualizar" /></label>
	  </td>
	  </tr>
     
	  </table>
    <br />
	 </form>
	 
    <table width="600" border="0" align="center">
      <tr>
        <td>  
	<div id="tabs">
		  <ul>
			<li><a href="#tabs-1">Relacionamentos Positivos</a></li>
			<li><a href="#tabs-2">Relacionamentos Negativos</a></li>
		  </ul>
		  <div id="tabs-1">
				
				<table width="600" border="0" align="center">
                </html>
				<?php
				
				 foreach ($xml -> marca as $marca) {
					$nome=utf8_decode($marca -> nome);
					$correlacao=utf8_decode($marca -> correlacao);
					$logo=utf8_decode($marca -> imagem);
					
					
					if ($correlacao > 0 && $nome==$analisada) 
					{
						echo "";
					} elseif ($correlacao > 0 && $nome!=$analisada) 
					{
						echo "<tr><td>";
						echo "<div class='tex'><img style='vertical-align:top' src='".$logo."' width='30' height='30' /></div><div class='bar'><div class='percentage' style=width:".$correlacao."%><b>"." ".$correlacao."%</b></div>
						</div>".$nome."";
						echo "</td></tr>";
						echo "<tr><td></td></tr>";
					}
				 }
				?>
				<html>
				</table>
				
		  </div>

		  <div id="tabs-2">
			<p>
			<table width="600" border="0" align="center">
                 </html>
				<?php
				
				 foreach ($xml -> marca as $marca) {
					$nome=utf8_decode($marca -> nome);
					$correlacao=utf8_decode($marca -> correlacao);
					$logo=utf8_decode($marca -> imagem);
					
					if ($correlacao <= 0 && $nome==$analisada) 
					{
						echo "";
					} 
					elseif ($correlacao <= 0 && $nome!=$analisada)
					{
						echo "<tr><td>";
						echo "<div class='tex'><img style='vertical-align:top' src='".$logo."' width='30' height='30' />
						</div><div class='bar'><div class='percentagen' style=width:".abs($correlacao)."%><b>"." ".$correlacao."%</b></div>
						</div>".$nome."";
						echo "</td></tr>";
						echo "<tr><td></td></tr>";
					}
				 }
				?>
				<html>
				</table>
            </p>
			<br />
		  </div>
		</div> 
		</td>
      </tr>
    </table>
	
	<br /><br />
	
	
	<table width="650" border="0" align="center">
		<tr>
			<td bgcolor="#b9e3e1">
				<table width="600" border="0" align="center">
					<tr>
						<td>
						<h2>Informações adicionais</h2>
						<br />
						</html>
							<?php
							foreach ($xml -> adicional as $adicional) {
								echo "<tr><td>";
								echo "<img src='image/plus.png' width='15' height='10' />".$adicional."";
								echo "</td></td>";
							}
							?>
						<html>
						</td>
					</tr>				
				</table>

			</td>
		  </tr>
		</table>
		
    </td>
    </tr>
	
      </table> <!-- tabela grande -->

	  
	  
        <div id="boxes">
            <div id="janela1" class="window">
            <a href="#" class="close">Fechar [x]</a><br />
            <br />
			<img src="image/logo06.png" width="225" height="82" border=0 /> <br /><br />
            <p>
            Brand é um sistema de apoio gerencial. Permite ao gestor de uma marca analisar de qual maneira esta marca se relaciona com as demais no mercado. 
            </p>
            </div>
        
          <div id="mask"></div>
        </div>
        
        <div id="boxes">
            <div id="janela2" class="window">
            <a href="#" class="close">Fechar [x]</a><br />
            <br />
            Informaçoes extras, etc.
            </div>
        
          <div id="mask"></div>
        </div>
	<br /><br />

</body>
</html>