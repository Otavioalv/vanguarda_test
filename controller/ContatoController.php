<?php
require_once 'model/Contato.php';

class ContatoController {
    private $contato;

    public function __construct($pdo) {
        $this->contato = new Contato($pdo);
    }

    // Funciona como um router.
    public function handleRequest() {
        try {
            // Rota de criar menssagem
            if (isset($_GET['criar'])) {
                $this->create();
                exit;
            }

            // Rota de deletar menssagem
            if (isset($_GET['excluir'])) {
                $this->delete();
                exit;
            }

            // Rota de listar menssagens
            if (isset($_GET['listar'])) {
                $this->list();
                exit;
            }
        } catch (Exception $e) {
            echo "Erro ao processar a requisição.";
        }
        
    }

    // Cria novo dado de menssagens
    public function create() {
         try {
            $nome = $_POST['nome'] ?? '';
            $email = $_POST['email'] ?? '';
            $mensagem = $_POST['mensagem'] ?? '';

            if ($nome && $email && $mensagem) {
                $this->contato->salvar($nome, $email, $mensagem);
            }

            header("Location: index.php?listar=1");
        } catch (Exception $e) {
            echo "Erro ao salvar a mensagem.";
        }
    }

    // Deleta menssagem
    public function delete() {
        try {
            $id = $_GET['excluir'] ?? null;

            // throw new Exception("Erro forçado");

            if ($id) {
                $this->contato->excluir($id);
            }

            header("Location: index.php?listar=1");
        } catch (Exception $e) {
            echo "Erro ao excluir a mensagem.";
        }
    }

    // Lista menssagens
    public function list() {
        try {
            $dados = $this->contato->listar();
            // throw new Exception("Erro forçado");

            require 'view/form.php';
        } catch (Exception $e) {
            echo "Erro ao listar as mensagens.";
        }
    }
}
