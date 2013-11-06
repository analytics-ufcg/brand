<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Brand</title>
<link href="style/style.css" rel="stylesheet" type="text/css" />


<!--codigo novo-->
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
<script type="text/javascript" src="bootstrap-select/bootstrap-select.js"></script>
<link rel="stylesheet" type="text/css" href="bootstrap-select/bootstrap-select.css">
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet">
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<script type="text/javascript">
        $(window).on('load', function () {

            $('.selectpicker').selectpicker({
                'selectedText': 'cat'
            });

            // $('.selectpicker').selectpicker('hide');
        });
</script>

<script type="text/javascript">  
    function mudarlogo(){
	   var nomemarca = document.marc.menu.value;
	   document.getElementById("logomarcas").src="image/icones/"+nomemarca+".jpg";
    }  
</script>

<!--fim do codigo novo-->



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

<body><!-- div tudo -->

<table width="900" height="271" border="0" align="center">
  <tr>
    <td bgcolor="#FFFFFF"><table width="788" height="215" border="0" align="center">
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
    
	<FORM ACTION="analisecorrelacao.php" METHOD="post" name="marc">
      <table width="600" height="200" border="0" align="center">
        <tr>
          <td bgcolor="#fff">
          <table width="603" height="300" border="0" align="left">
            <tr>
              <td>
              <label>
				
				<!-- alberto, creio que aqui voce deve aplicar o seletor (: -->
				<?php
					if (file_exists('data.xml')) {
						$xml = simplexml_load_file('data.xml');
						$opcoes = "<select name='menu' class='selectpicker' data-live-search='true' onChange='mudarlogo()'>";
						foreach($xml -> marca as $marca){
							$opcoes = $opcoes."<option>".utf8_decode($marca->nome)."</option>";
						}
						echo $opcoes."</select>";
					}
				?>
                
              </label>
              
              </td>
            </tr>
            <tr>
              <td>
			  <img id="logomarcas">
              </td>
            </tr>
            <tr>
              <td><label><input type="submit" value="Pesquisar" /></label>  
			 </form>
	</td>
  </tr>
</table>


		<!-- modais -->
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
  
</body>
</html>