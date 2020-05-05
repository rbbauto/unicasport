<?php
require __DIR__ . '/database_connection.php';

class Crud{

    protected $db;

    public function __construct()
    {
        $this->db = DB();
    }


    public function Read()
    {
        $query = $this->db->prepare("SELECT * FROM productos");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row;
        }

        return json_encode(['productos' => $data]);
    }

     public function ReadCat()
    {
        $query = $this->db->prepare("SELECT nombre_categoria FROM categorias");
        $query->execute();
        $data = array();
        while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
            $data[] = $row['nombre_categoria'];
        }

        return json_encode(['categorias' => $data]);
    }


    public function Create($name, $description,$imagen,$color,$categoria,$stock,$activa)
    {   
        $imagen = isset($imagen) ? $imagen : "assets/imgDefault/default.png";
        $categoria = isset($categoria) ? $categoria : "Varios";

        $query = $this->db->prepare("INSERT INTO productos(nombre, descripcion, imagen,color,categoria,stock,activa) VALUES (:nombre,:descripcion,:imagen,:color,:categoria,:stock,:activa)");
        $query->bindParam("nombre", $name, PDO::PARAM_STR);
        $query->bindParam("descripcion", $description, PDO::PARAM_STR);
        $query->bindParam("imagen", $imagen, PDO::PARAM_STR);
        $query->bindParam("color", $color, PDO::PARAM_STR);
        $query->bindParam("categoria", $categoria, PDO::PARAM_STR);
        $query->bindParam("stock", $stock, PDO::PARAM_STR);
        $query->bindParam("activa", $activa, PDO::PARAM_STR);
        $query->execute();

        return json_encode(['producto' => [
            'id'            => $this->db->lastInsertId(),
            'nombre'        => $name,
            'descripcion'   => $description,
            'imagen'        => $imagen,
            'color'         => $color,
            'categoria'     => $categoria,
            'stock'         => $stock,
            'activa'        => $activa
        ]]);
    }
    
     public function CreateCat($categoria)
    {   
        $categoria = isset($categoria) ? $categoria : "Varios";
        
        try{
            $query = $this->db->prepare("INSERT INTO categorias (id, nombre_categoria) VALUES (NULL, :categoria)");
            $query->bindParam("categoria", $categoria, PDO::PARAM_STR);
            $query->execute();
            return json_encode([['errors' => ''], 'categoria'     => $categoria]);           
        }catch(Exception $e){
            http_response_code(400);
            return json_encode(['errors' => ["La Categoria : '$categoria' ya existe!"]]);
        }

        
        
    }

    public function Delete($product_id)
    {
        $query = $this->db->prepare("DELETE FROM productos WHERE id = :id");
        $query->bindParam("id", $product_id, PDO::PARAM_STR);
        $query->execute();
    }


    public function Update($name, $description, $product_id,$imagen,$color,$categoria,$stock,$activa)
    {
        $query = $this->db->prepare("UPDATE productos SET imagen = :imagen, nombre = :nombre, descripcion = :descripcion, color = :color, categoria = :categoria, stock = :stock, activa = :activa  WHERE id = :id");
        $query->bindParam("nombre", $name, PDO::PARAM_STR);
        $query->bindParam("descripcion", $description, PDO::PARAM_STR);
        $query->bindParam("id", $product_id, PDO::PARAM_STR);
        $query->bindParam("imagen", $imagen, PDO::PARAM_STR);
        $query->bindParam("color", $color, PDO::PARAM_STR);
        $query->bindParam("categoria", $categoria, PDO::PARAM_STR);
        $query->bindParam("stock", $stock, PDO::PARAM_STR);
        $query->bindParam("activa", $activa, PDO::PARAM_STR);
        $query->execute();
    }

   

   

}

?>