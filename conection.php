<?php 

/**
 * Clase conection
 * Se encarga de establecer una conexión a una base de datos MySQL usando PDO.
 */
class connection {
    // Propiedad privada que contiene la dirección del servidor de base de datos
    private $servidor = 'localhost';

    // Propiedad privada que contiene el nombre de usuario para acceder a la base de datos
    private $user = 'root';

    // Propiedad privada que contiene la contraseña del usuario (en este caso está vacía)
    private $pass = '';

    // Propiedad privada para almacenar la conexión a la base de datos
    private $DB;

    /**
     * Constructor de la clase
     * Este método se ejecuta automáticamente cuando se crea una instancia de la clase.
     * Intenta establecer una conexión con la base de datos MySQL usando PDO.
     */
    public function __construct(){
        try {
            // Se crea una nueva instancia de PDO para conectarse a la base de datos 'php'
            // con las credenciales definidas en las propiedades $servidor, $user, y $pass
            $this->connection = new PDO("mysql:host=$this->servidor;dbname=php", $this->user, $this->pass);

            // Se establece el modo de error para que PDO lance excepciones en caso de error
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            // Si ocurre un error en la conexión, se captura la excepción y se muestra un mensaje de error
            echo "Error al conectar a la base de datos: " . $e->getMessage();
        }
    }

    /**
     * Método ejecutar
     * Ejecuta una consulta SQL proporcionada y devuelve el ID de la última fila insertada.
     * 
     * @param string $sql La consulta SQL a ejecutar
     * @return int El ID de la última inserción
     */

    //------------insertar información.---------------
    public function ejecutar($sql){ 
        // Ejecuta la consulta SQL
        $this->connection->exec($sql);
        // Devuelve el ID de la última fila insertada en la base de datos
        return $this->connection->lastInsertId();
    }

    public function recoverInfoDb($sql){
        $sentencia=$this->connection->prepare($sql);//el prepare toma la instrucción sql y la almacena enla variable en este caso en la variable misma $sentencia.
        $sentencia->execute();
        return $sentencia->fetchAll();
    }
}

?>
