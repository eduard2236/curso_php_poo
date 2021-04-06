<h1>Registro de nuevo usuario</h1>
<?php if(isset($_SESSION['register']) && $_SESSION['register'] == 'complete'):?>
    <strong class="alert_green" > Registro completado correctamente </strong>
<?php elseif(isset($_SESSION['register']) && $_SESSION['register'] == 'failed'): ?>
    <strong class="alert_red"> Registro Fallido, Introduce bien los datos </strong>
<?php endif; ?>
<?php utils::deleteSession('register'); ?>
<form action="<?=base_url?>usuario/save" method="post">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" />

<label for="apellido">Apellido</label>
<input type="text" name="apellido" required/>

<label for="email">Email</label>
<input type="email" name="email" required/>

<label for="password">Password</label>
<input type="password" name="password" required/>

<input type="submit"  value="Registrar">

</form>