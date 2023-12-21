<?php

namespace app\Models;

include "app/Config/DatabaseConfig.php";


use app\Config\DatabaseConfig;
use mysqli;

class Products extends DatabaseConfig
{

   public $conn;

   public function __construct()
   {
      //connect ke database mysql
      $this->conn = new mysqli($this->host, $this->user, $this->password, $this->database_name, $this->port);
      //connection checking
      if ($this->conn->connect_error){
         die("COnnection failed : " . $this->conn->connect_error);
      }
   }


   //proses menampilkan semua data
   public function findAll()
   {
      $sql = "SELECT * FROM products";
      $result = $this->conn->query($sql);
      $this->conn->close();
      $data = [];
      while ($row = $result->fetch_assoc()){
         $data[] = $row;
      }

      return $data;
   }

   //menampilkan data dengan ID,
   public function findById($id)
   {
      $sql = "SELECT * FROM products WHERE id = ?";
      $stmt = $this->conn->prepare($sql);
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $result = $stmt->get_result();
      $this->conn->close();
      $data = [];
      while ($row = $result->fetch_assoc()){
         $data[] = $row;
      }

      return $data;
   }

   //proses insert data
   public function create($data)
   {
      $productName = $data['product_name';
      $query = "INSERT INTO products (product_name) VALUES (?)";
      $stmt = $this->conn->prepare($query);
      $stmt->bind_param("s", $productName);
      $stmt->execute();
      $this->conn->close();
   }

   //proses update data dengan ID
   public function update ($data, $id)
   {
      $productName = $data['product_name'];

      $query = "UPDATE products SET product_name = ? WHERE id = ?";
      $stmt = $this->conn->prepare($query);

      //s buat tipe parameter product_name, yakni string dan huruf i yg artinya integer
      $stmt->bind_param("si", $productName, $id);
      $stmt->execute();
      $this->conn->close();
   }

   //proses delete data menggunakan id
   public function destriy($id)
   {
      $query = "DELETE FROM products WHERE id = ?"
      $stmt = $this->conn->prepare($query);
      //i artinya parameter pertama yang digunakan adalah inteegr
      $stmt->bind_param("i", $id);
      $stmt->execute();
      $this->conn->close();
   }
}