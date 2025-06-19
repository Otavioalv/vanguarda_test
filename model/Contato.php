<?php

    class Contato {
        private $pdo;

        public function __construct($pdo) {
            $this->pdo = $pdo;
        }

        // Função de salvar menssagem no banco de dados
        public function salvar($nome, $email, $mensagem) {
            try {
                // prepared statements usado
                $stmt = $this->pdo->prepare("INSERT INTO contatos (nome, email, mensagem) VALUES (?, ?, ?)");
            
                $stmt->execute([$nome, $email, $mensagem]);
            } catch (PDOException $e) {
                echo "Erro ao criar dados: " . $e->getMessage();
            }
        }

        // Função de excluir menssagem no banco de dados
        public function excluir($id) {
            try {
                // prepared statements usado
                $stmt = $this->pdo->prepare("DELETE FROM contatos WHERE id = ?");
                
                $stmt->execute([$id]);
            } catch (PDOException $e) {
                echo "Erro ao deletar dados: " . $e->getMessage();
            }
        }

        // Função de listar
        public function listar() {
            try {
                // Retorna uma array com os dados
                return $this->pdo->query("SELECT * FROM contatos")->fetchAll(PDO::FETCH_ASSOC);

            } catch(PDOException $e) {
                echo "Erro ao listar dados: " . $e->getMessage();
                return [];
            }

        }
    }
    
?>
