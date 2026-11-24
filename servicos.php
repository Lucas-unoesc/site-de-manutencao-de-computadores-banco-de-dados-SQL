<?php
require_once "conexao.php";

$sql = "SELECT id, titulo, descricao, preco, imagem, alt_texto FROM servicos ORDER BY id ASC";
$resultado = $conexao->query($sql);

$servicos = [];
if ($resultado && $resultado->num_rows > 0) {
    while ($linha = $resultado->fetch_assoc()) {
        $servicos[] = $linha;
    }
}
?>
<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Serviços - GlitchTech</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <!-- Font Awesome (Ícones) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </head>
  <body>

    <!-- Barra de Navegação -->
    <nav class="navbar bg-success mb-4" data-bs-theme="dark">
      <div class="container-fluid align-items-center">
        <!-- Título/Marca da barra de navegação -->
        <a href="pagina-principal.html" class="navbar-brand mb-0 h1 text-light d-flex align-items-center gap-2">
          <i class="fa-solid fa-shop"></i> GlitchTech
        </a>

        <!-- Grupo de botões de navegação -->
        <div class="d-flex gap-2 ms-auto">
          <a href="index.html" class="btn btn-outline-light">Voltar</a>
          <a href="depoimentos.html" class="btn btn-light">Depoimentos</a>
          <a href="contatos.html" class="btn btn-light">Contatos</a>
          <a href="blog.html" class="btn btn-light">Blog</a>
          <a href="sobre-empresa.html" class="btn btn-light">Sobre Empresa</a>
        </div>
      </div>
    </nav>

    <!-- Conteúdo Principal -->
    <main class="container mb-5">
      <h1 class="h2 text-center mb-4">Nossos Serviços</h1>

      <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (count($servicos) > 0): ?>
          <?php foreach ($servicos as $servico): ?>
            <?php
              $precoFormatado = "R$ " . number_format((float)$servico["preco"], 2, ",", ".");
            ?>
            <div class="col">
              <div class="card h-100 shadow-sm border-0">
                <img src="<?= htmlspecialchars($servico["imagem"], ENT_QUOTES, "UTF-8") ?>" class="card-img-top" alt="<?= htmlspecialchars($servico["alt_texto"], ENT_QUOTES, "UTF-8") ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title text-success"><?= htmlspecialchars($servico["titulo"], ENT_QUOTES, "UTF-8") ?></h5>
                  <p class="card-text"><?= htmlspecialchars($servico["descricao"], ENT_QUOTES, "UTF-8") ?></p>
                  <div class="mt-auto">
                    <p class="mb-2"><strong>Preço:</strong> <?= htmlspecialchars($precoFormatado, ENT_QUOTES, "UTF-8") ?></p>
                    <button type="button"
                            class="btn btn-danger w-100"
                            data-bs-toggle="modal"
                            data-bs-target="#modalCompra"
                            data-nome="<?= htmlspecialchars($servico["titulo"], ENT_QUOTES, "UTF-8") ?>"
                            data-preco="<?= htmlspecialchars($precoFormatado, ENT_QUOTES, "UTF-8") ?>">
                      <i class="fa-solid fa-cart-shopping me-2"></i>Comprar
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php else: ?>
          <div class="col-12">
            <div class="alert alert-warning text-center" role="alert">
              Nenhum serviço cadastrado no banco de dados no momento.
            </div>
          </div>
        <?php endif; ?>
      </div>
    </main>

    <!-- Modal de Confirmação de Compra -->
    <div class="modal fade" id="modalCompra" tabindex="-1" aria-labelledby="modalCompraLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header bg-success text-white">
            <h5 class="modal-title" id="modalCompraLabel">
              <i class="fa-solid fa-cart-check me-2"></i>Confirmar Pedido
            </h5>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>
          <div class="modal-body">
            <p>Você está prestes a contratar o seguinte serviço:</p>
            <div class="p-3 bg-light rounded border mb-3">
              <h6 class="fw-bold mb-1 text-success" id="modalNomeServico">Nome do Serviço</h6>
              <span class="fs-5 fw-bold" id="modalPrecoServico">R$ 0,00</span>
            </div>
            <p class="small text-muted mb-0">Deseja prosseguir para a confirmação do atendimento?</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cancelar</button>
            <a href="contatos.html" class="btn btn-success">Finalizar Pedido</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

    <!-- Script JS para capturar os dados do card e colocar no Modal -->
    <script>
      document.addEventListener('DOMContentLoaded', function () {
        const modalCompra = document.getElementById('modalCompra');
        
        modalCompra.addEventListener('show.bs.modal', function (event) {
          const button = event.relatedTarget;
          
          const nome = button.getAttribute('data-nome');
          const preco = button.getAttribute('data-preco');
          
          document.getElementById('modalNomeServico').textContent = nome;
          document.getElementById('modalPrecoServico').textContent = preco;
        });
      });
    </script>
  </body>
</html>
<?php
$conexao->close();