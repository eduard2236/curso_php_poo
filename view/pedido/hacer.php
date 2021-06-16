<?php if(isset($_SESSION['identity'])): ?>
<h1>Confirmar Pedido</h1>
<p>
<a href="<?=base_url?>carrito/index">Ver los productos y el precio del pedido</a>
</p>
<br/>
<h3>Direccion del pedido</h3>
<form action="<?=base_url?>pedidos/add" method="POST">

<label for="pais">Pais</label>
<input type="text" name="pais"/>

<label for="estado">Estado</label>
<input type="text" name="estado"/>

<label for="direccion">direccion</label>
<input type="text" name="direccion"/>

<input type="submit" value="Confirmar">

</form>
<?php else: ?>
<h1>Debes estar identificado</h1>
<p class="carrito_logueo">Necesitas estar logueado en la web para poder realizar tu pedido</p>
<?php endif ; ?>