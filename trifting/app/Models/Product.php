<?php
class Product {
    private $conn;
    private $table = "products";

    public function __construct($db){ $this->conn = $db; }

    public function all($search=null,$limit=5,$offset=0){
        $query = "SELECT * FROM $this->table";
        if($search) $query .= " WHERE name LIKE :search OR category LIKE :search";
        $query .= " ORDER BY created_at DESC LIMIT :limit OFFSET :offset";
        $stmt = $this->conn->prepare($query);
        if($search) $stmt->bindValue(':search', "%$search%");
        $stmt->bindValue(':limit',(int)$limit,PDO::PARAM_INT);
        $stmt->bindValue(':offset',(int)$offset,PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function count($search=null){
        $query = "SELECT COUNT(*) as total FROM $this->table";
        if($search) $query .= " WHERE name LIKE :search OR category LIKE :search";
        $stmt = $this->conn->prepare($query);
        if($search) $stmt->bindValue(':search', "%$search%");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }

    public function find($id){
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data){
        $stmt = $this->conn->prepare("INSERT INTO $this->table (name, category, description, price, image) VALUES (:name,:category,:desc,:price,:image)");
        $stmt->execute([
            ':name'=>$data['name'],
            ':category'=>$data['category'],
            ':desc'=>$data['description'],
            ':price'=>$data['price'],
            ':image'=>$data['image']
        ]);
    }

    public function update($id,$data){
        $stmt = $this->conn->prepare("UPDATE $this->table SET name=:name, category=:category, description=:desc, price=:price, image=:image WHERE id=:id");
        $stmt->execute([
            ':name'=>$data['name'],
            ':category'=>$data['category'],
            ':desc'=>$data['description'],
            ':price'=>$data['price'],
            ':image'=>$data['image'],
            ':id'=>$id
        ]);
    }

    public function delete($id){
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id=:id");
        $stmt->bindParam(':id',$id);
        $stmt->execute();
    }
}
