<?php
// auteur: Dylano Nietveld
// functie: functies voor crud genre

include_once "config.php";

function connectDb(){
    $servername = SERVERNAME;
    $username = USERNAME;
    $password = PASSWORD;
    $dbname = DATABASE;
   
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conn;
    } 
    catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
}

function crudMain(){

    $txt = "
    <h1>Crud Genre</h1>
    <nav>
        <a href='insert.php'>Toevoegen nieuw genre</a>
    </nav><br>";
    echo $txt;

    $result = getData(CRUD_TABLE);

    printCrudTabel($result);
}

function getData($table){
    $conn = connectDb();

    $sql = "SELECT * FROM $table";
    $query = $conn->prepare($sql);
    $query->execute();
    $result = $query->fetchAll();

    return $result;
}

function getRecord($id){
    $conn = connectDb();

    $sql = "SELECT * FROM " . CRUD_TABLE . " WHERE genreid = :id";
    $query = $conn->prepare($sql);
    $query->execute([':id'=>$id]);
    $result = $query->fetch();

    return $result;
}

function printCrudTabel($result){
    if (!$result) {
        echo "<p>Geen gegevens gevonden.</p>";
        return;
    }

    $table = "<table>";

    $headers = array_keys($result[0]);
    $table .= "<tr>";
    foreach($headers as $header){
        $table .= "<th>" . $header . "</th>";   
    }

    $table .= "<th colspan='2'>Actie</th>";
    $table .= "</tr>";

    foreach ($result as $row) {
        $table .= "<tr>";

        foreach ($row as $cell) {
            $table .= "<td>" . $cell . "</td>";  
        }
        
        $table .= "<td>
            <form method='post' action='update.php?id=$row[genreid]'>       
                <button>Wzg</button>	 
            </form>
        </td>";

        $table .= "<td>
            <form method='post' action='delete.php?id=$row[genreid]'>       
                <button>Verwijder</button>	 
            </form>
        </td>";

        $table .= "</tr>";
    }
    $table .= "</table>";

    echo $table;
}

function updateRecord($row){
    $conn = connectDb();

    $sql = "UPDATE " . CRUD_TABLE . "
            SET genrenaam = :genrenaam
            WHERE genreid = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':genrenaam' => $row['genrenaam'],
        ':id' => $row['id']
    ]);

    $retVal = ($stmt->rowCount() >= 0) ? true : false;
    return $retVal;
}

function insertRecord($post){
    $conn = connectDb();

    $sql = "INSERT INTO " . CRUD_TABLE . " (genrenaam)
            VALUES (:genrenaam)";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':genrenaam' => $post['genrenaam']
    ]);

    $retVal = ($stmt->rowCount() == 1) ? true : false;
    return $retVal;  
}

function deleteRecord($id){
    $conn = connectDb();

    $sql = "DELETE FROM " . CRUD_TABLE . " WHERE genreid = :id";

    $stmt = $conn->prepare($sql);

    $stmt->execute([
        ':id' => $id
    ]);

    $retVal = ($stmt->rowCount() == 1) ? true : false;
    return $retVal;
}
?>