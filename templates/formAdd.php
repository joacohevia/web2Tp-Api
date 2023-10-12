<?php 
    require_once 'templates/header.phtml';  
    ?>
<div class="container">
    <h2>Agregar un nuevo item</h2>
    <form action="procesar_formulario.php" method="post">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="form-group col-md-6">
                <label for="apellido">Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="ciudad">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad">
            </div>
            <div class="form-group col-md-6">
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="telefono">Teléfono</label>
                <input type="tel" class="form-control" id="telefono" name="telefono">
            </div>
            <div class="form-group col-md-6">
                <label for="estado">Estado</label>
                <select class="form-control" id="estado" name="estado">
                    <option value="activo">Enviado</option>
                    <option value="inactivo">En proceso</option>
                </select>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="fecha">Fecha</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <div class="form-group col-md-6">
                <label for="especificaciones">Especificaciones</label>
                <textarea class="form-control" id="especificaciones" name="especificaciones"></textarea>
            </div>
        </div>
        <div class="form-row col-md-6">
        <label for="categoria">Seleccione un producto:</label>
            <select class="form-control" id="categoria" name="categoria">

                <option value="Remera">Remeras</option>
                <option value="Pantalone">Pantalones</option>
                <option value="Buzo">Buzos</option>
                <option value="Campera">Camperas</option>
                <option value="Zapatilla">Zapatillas</option>
            </select>
        </div>
            <div class="form-group col-md-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
            </div>

            <div class="form-group col-md-3">
                <label for="precio">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01">
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </div>
    </form>
</div>

</body>
</html>
