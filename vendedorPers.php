<?php
require_once ('conexao.php');
class VendedorPers{
	public $conn;
	public function __construct(){
		$a = new Conexao();
		$this->conn = $a->conectar();
	}
	
	public function Inserir($nome,$telefone){
		try{
			$sql = "INSERT INTO vendedor (nome,telefone) VALUES (?, ?)";
			$stmt = $this->conn->prepare($sql);
			$stmt->bindParam(1,$nome);
			$stmt->bindParam(2,$telefone);
			$stmt->execute();
			
			return $last_id = $this->conn->lastInsertId();
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		} 
	}
	
	public function BuscarVendedor(){
		try{
			$sql = "SELECT * FROM vendedor";
			$stmt = $this->conn->prepare($sql);
			$stmt->execute();
			//$result = $stmt->fetch(PDO::FETCH_OBJ);
                        $linha = $stmt->fetchAll(PDO::FETCH_ASSOC);
                        return $linha;
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		} 
	}
        public function Alterar($id,$nome,$telefone){
		try{
                    $sql = "UPDATE vendedor SET nome = ?, telefone = ? WHERE id = ?";
                        $stmt = $this->conn->prepare($sql);
                        $stmt->bindParam(1,$nome);
                        $stmt->bindParam(2,$telefone);
                        $stmt->bindParam(3,$id);
			$stmt->execute();
                        return $last_id = $this->conn->lastInsertId();
		}
		catch(PDOException $e){
			echo "Error: " . $e->getMessage();
		} 
		finally {
			$this->conn = null;
		}
	}
}        
?>        