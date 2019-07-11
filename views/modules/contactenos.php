<footer class="row" id="contactenos">

	<hr>
	<h1 class="text-center text-info"><b>CONTACTO</b></h1>
	<hr>
	
	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
	
		<iframe src="https://maps.google.com/maps?q=Tabasco%2C%20Mexico&t=&z=5&ie=UTF8&iwloc=&output=embed" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>
		<!--<iframe width="700" height="440" src="https://maps.google.com/maps?width=700&amp;height=440&amp;hl=en&amp;q=Cunduac%C3%A1n%2C%20Tabasco+(T%C3%ADtulo)&amp;ie=UTF8&amp;t=&amp;z=9&amp;iwloc=B&amp;output=embed" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>-->

		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 jumbotron">

    		<h4 class="blockquote-reverse text-primary">
    			<ul>
	              <li><span class="glyphicon glyphicon-phone"></span>  (123) 234 56 78</li>
	              <li><span class="glyphicon glyphicon-map-marker"></span>  Calle 45F 32 - 45</li>
	              <li><span class="glyphicon glyphicon-envelope"></span>  hola@correo.com</li>    
	          	</ul>      
    		</h4>

		</div>

	</div>

	<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12" id="formulario" >

		<ol>
    		<li>
        		<a href="http://www.facebook.com" target="_blank">
          		<i class="fa fa-facebook" style="font-size:24px;"></i>  
       		 	</a>
   			</li>

    		<li>
        		<a href="http://www.youtube.com" target="_blank">  
          		<i class="fa fa-youtube" style="font-size:24px;"></i>  
       			</a>
    		</li>
    
    		<li>
        		<a href="http://www.twitter.com" target="_blank">
          		<i class="fa fa-twitter" style="font-size:24px;"></i>  
        		</a>
    		</li>
		</ol>

			<form method="post" onsubmit="return validarMensaje()">
			    <input type="text" class="form-control"  placeholder="Nombre" id="nombre" name="nombre" required>

			    <input type="email" class="form-control" placeholder="Email" id="email" name="email">

			    <textarea name="mensaje" id="mensaje" cols="30" rows="5" placeholder="Contenido del Mensaje" class="form-control"></textarea>

			 
			  	<input type="submit" class="btn btn-default" value="Enviar">
			</form>

		<?php
			$mensajes = new MensajesController();
			$mensajes -> registroMensajesController();
		?>		

	</div>

</footer>
