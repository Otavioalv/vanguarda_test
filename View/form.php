<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Taiwind via CDN para estilizar o projeto -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>Formulario - Vanguarda</title>
</head>
<body class="flex justify-center items-center flex-col">
    
<h2 class="my-5 font-bold text-lg">
        Formulário
    </h2>
    
    <form method="post" action="?criar=1" class="flex flex-col w-96">
        
        Nome: <input class="border p-2" type="text" name="nome" required>
        Email: <input class="border p-2" type="email" name="email" required>
        Mensagem: <textarea class="border p-2 h-36" name="mensagem" required></textarea>
        
        <button type="submit" class="bg-green-400 my-6 p-2 rounded-sm cursor-pointer text-white hover:bg-green-500">Enviar</button>
    </form>


    

    <?php if (!empty($dados)): ?>
        <h2 class="my-5 font-bold text-lg">
            Mensagens recebidas
        </h2>
        <table class="w-3/4 flex  items-center justify-center mb-20">
            
            <tr class="border">
                <th class="border p-2">Nome</th>
                <th class="border p-2">Email</th>
                <th class="border p-2">Mensagem</th>
                <th class="border p-2">Ação</th>
            </tr>
            
            <!-- Variavel "dados" vem de ContatoController.php -->

            
            <?php foreach($dados as $linha): ?>
                    <tr class="border">
                        <!-- htmlspecialchar - converte o caracteres especiais em entidades HTML seguras  -->
                        <td class="border p-2 max-w-80 overflow-auto"><?= htmlspecialchars($linha['nome']) ?>teste</td>
                        <td class="border p-2 max-w-80 overflow-auto"><?= htmlspecialchars($linha['email']) ?></td>
                        <td class="border p-2 max-w-80 overflow-auto"><?= htmlspecialchars($linha['mensagem']) ?></td>
                        
                        <td class="border p-4">
                            <!-- Botao de excluir uma menssagem -->
                            <a 
                                href="?excluir=<?= $linha['id'] ?>" 
                                onclick="return confirm('Excluir mensagem?')"
                                class="bg-red-400 my-6 p-2 rounded-sm cursor-pointer text-white hover:bg-red-500 "
                            >
                                DELETAR
                            </a>
                        </td>
                    </tr>
            <?php endforeach; ?>
        </table>

    <?php else: ?>
        <tr>
            <td colspan="4" class="text-center p-4">Nenhuma mensagem encontrada.</td>
        </tr>
    <?php endif; ?>
</body>
</html>
