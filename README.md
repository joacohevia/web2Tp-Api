## Obtener información de las tablas
- **Método HTTP**: GET,POST.
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/lista/`
- **Descripción**: Con el metodo GET permite obtener información de la tabla productos y con el metodo POST permite agregar nuevos productos.
- **Respuesta**:
  json
  {
     {
        "IDProducto": 15,
        "Tipo": "Verano",
        "Talle": "M",
        "Precio": 10000
    }
  }

  - **Método HTTP**: GET,DELETE,PUT.
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/lista/id`
- **Descripción**: Con el metodo GET permite obtener la informacion detallada de un producto de la tabla productos, con el metodo DELETE permite eliminar un producto y con el metodo PUT permite modificar un producto.
- **Respuesta**:
  json
  {
    {
        "IDProducto": 15,
        "IDCategoria": 18,
        "Tipo": "Verano",
        "Talle": "M",
        "Precio": 10000,
        "Color": "Blanco",
        "Stock": "No"
    }
  }
- **Metodo HTTP**: GET
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/lista/id/subrecurso`
- **Descripcion**: Permite traer un solo campo de la tabla productos.
- **Respuesta**:
json 
{
    {
      "Verano"
    }
}

- **Metodo HTTP**: GET
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/lista?sort=precio&order=ASC`
- **Descripcion**: Este edpoint permite ordenar la lista de la tabla productos por los precios en orden ascendente.
json 
  {
      {
        "IDProducto": 22,
        "Tipo": "aCREADA CON API",
        "Talle": "McsdcDS",
        "Precio": 1000005
      }
  }


- **Método HTTP**: GET,POST.
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/categoria/`
- **Descripción**: Con el metodo GET permite obtener información de la tabla categorias y con el metodo POST permite agregar nuevas categorias.
- **Respuesta**:
  json
  {
     {
        "IDCategoria": 18,
        "Categoria": "Remera",
        "Descripcion": "Campera",
        "Marca": "Toper",
        "Material": "Algodon"
    }
  }

  - **Método HTTP**: GET,DELETE,PUT.
- **URL del Endpoint**: `../api/categoria/id`
- **Descripción**:Con el metodo GET permite obtener los productos que estan asociados a una categoria, con el metodo DELETE permite eliminar una categoria y con el metodo PUT permite modificar una categoria.
- **Respuesta**:
  json
  {
     {
        "IDProducto": 15,
        "IDCategoria": 18,
        "Tipo": "Verano",
        "Talle": "M",
        "Precio": 10000,
        "Color": "Blanco",
        "Stock": "No",
        "Categoria": "Remera"
    }
  }

- **Método HTTP**: GET.
- **URL del Endpoint**: `localhost/Web2Tp-Api/Web2Tp-Api/api/lista?sort=precio&order=ASC`
- **Descripción**:Este edpoint permite ordenar la lista de la tabla productos por los precios en orden ascendente.
- **Respuesta**:
  json
  {
     {
        "IDProducto": 15,
        "IDCategoria": 18,
        "Tipo": "Verano",
        "Talle": "M",
        "Precio": 10000,
        "Color": "Blanco",
        "Stock": "No",
        "Categoria": "Remera"
    }
  }




