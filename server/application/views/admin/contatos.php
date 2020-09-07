<div class="row">
  <div class="col-md-12">
  <h3 style="margin-top: 1em">Contatos pelo site</h3>
    <?php foreach ($contatos as $contato):
      $date = new DateTime($contato->dthr, new DateTimeZone('America/Sao_Paulo')); ?>
    <div class="card" style="margin: 10px 0">
      <div class="card-body">
        <h5><?= $contato->titulo ?></h5>
        <b>Data: </b><?= $date->format('d/m/Y à\s H:i:s') ?><br/>
        <b>Nome: </b><?= $contato->nome ?><br/>
        <b>Contato: </b><?= $contato->contato ?><br/>
        <b>Conteúdo: </b><br><?= str_replace("\n", "<br/>", $contato->conteudo) ?>
      </div>
    </div>
    <?php endforeach; ?>
    <nav aria-label="Page navigation">
      <ul class="pagination" style="justify-content: center">
        <li class="page-item<?= $page == 1 ? ' disabled' : '' ?>">
          <a href="<?= '/admin/contatos/'.($page-1) ?>" aria-label="Previous" class="page-link">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>
        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
        <li class="page-item<?= $i == $page ? ' active' : '' ?>">
          <a class="page-link" href="<?= '/admin/contatos/'.$i ?>"><?= $i ?></a>
        </li>
        <?php endfor; ?>
        <li class="page-item<?= $page == $total_pages ? ' disabled' : '' ?>">
          <a href="<?= '/admin/contatos/'.($page+1) ?>" aria-label="Next" class="page-link">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>
  </div>
</div>

<style>

</style>