<h1>Registro de nuevo usuario</h1>

<form action="index.php?controller=usuario&action=save" method="post">

<label for="nombre">Nombre</label>
<input type="text" name="nombre" required/>

<label for="apellido">Apellido</label>
<input type="text" name="apellido" required/>

<label for="email">Email</label>
<input type="email" name="email" required/>

<label for="password">Password</label>
<input type="password" name="password" required/>

<input type="submit"  value="Registrar">

</form>