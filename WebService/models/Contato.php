<?php
    class Contato {
        private $conn;
        private $table = "CONTATOS";

        public $id;
        public $nome;
        public $email;
        public $data_nascimento;
        public $telefone;
        public $status_integracao_b;
        public $id_integracao_sistema_b;

        public function __construct($db) {
            $this->conn = $db;
        }

        public function read() {
            $query = "SELECT 
                id,
                nome,
                email,
                telefone,
                data_nascimento,
                status_integracao_b,
                id_integracao_sistema_b
            FROM " .$this->table;

            $stmt = $this->conn->prepare($query);
            $stmt->execute();

            return $stmt;
        }

        public function create() {
            $query = "INSERT INTO " .$this->table ." 
            (nome, email, telefone, data_nascimento) 
            VALUES 
            (
                :nome,
                :email,
                :telefone,
                :data_nascimento
            )";

            $stmt = $this->conn->prepare($query);
            $this->nome = htmlspecialchars(strip_tags($this->nome));
            $this->email = strtolower(htmlspecialchars(strip_tags($this->email)));
            $this->telefone = htmlspecialchars(strip_tags($this->telefone));
            $this->data_nascimento = htmlspecialchars(strip_tags($this->data_nascimento));
            
            $stmt->bindParam(':nome', $this->nome);
            $stmt->bindParam(':email', $this->email);
            $stmt->bindParam(':telefone', $this->telefone);
            $stmt->bindParam(':data_nascimento', $this->data_nascimento);
            
            if($stmt->execute()) {
                return true;
            }

            print_f("ERROR: %s. \n", $stmt->error);
            return false;
        }
    }