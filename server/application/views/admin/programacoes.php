<div class="row">
  <div class="col-md-12">
    <div class="card-body">
      <h5 class="card-title">Cadastro</h5>
      <div class="row">
        <div class="col-md-12">
          <input type="text" class="form-control" disabled id="txt_id">
          <div class="form-group">
            <label for="txt_nome">Nome:</label>
            <input type="text" class="form-control" id="txt_nome">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="txt_descricao">Descricao:</label>
            <textarea class="form-control" id="txt_descricao"></textarea>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="slct_dia">Dia:</label><br>
            <select id="slct_dia" class="form-control">
              <option value="0">Domingo</option>
              <option value="1">Segunda-feira</option>
              <option value="2">Terça-feira</option>
              <option value="3">Quarta-feira</option>
              <option value="4">Quinta-feira</option>
              <option value="5">Sexta-feira</option>
              <option value="6">Sábado</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="txt_horario">Horário:</label><br>
            <input type="time" class="form-control" id="txt_horario">
          </div>
        </div>
        <div class="col-md-12">
          <div class="form-group">
            <label for="slct_status">Ativo:</label><br>
            <select id="slct_status" class="form-control">
              <option value="1">Ativo</option>
              <option value="0">Inativo</option>
            </select>
          </div>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-auto">
          <button id="bt_novo" class="btn btn-outline-primary">Novo</button>
          <button id="bt_salvar" class="btn btn-primary">Salvar</button>
        </div>
      </div>
    </div>
    <div class="card-body">
      <h5 class="card-title">Registros</h5>
      <table class="table" id="tbl_registros">
        <thead>
          <tr>
            <th>Nome</th>
            <th>Dia</th>
            <th>Horário</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<script>
  let programacoes = <?= json_encode($programacoes) ?>;
  $(document).ready(function () {
    $("#bt_salvar").click(() => {
      let programacao = {
        id: $("#txt_id").val(),
        nome: $("#txt_nome").val(),
        descricao: $("#txt_descricao").val(),
        dia_semana: $("#slct_dia").val(),
        horario: $("#txt_horario").val(),
        ativo: $("#slct_status").val(),
      }
      if (!programacao.nome) { alert('Insira um nome válido'); return $("#txt_nome").focus() }
      if (!programacao.dia_semana) { alert('Selecione um dia válido'); return $("#slct_dia").focus() }
      if (!programacao.horario) { alert('Insira um horário válido'); return $("#txt_horario").focus() }
      if (!programacao.ativo) { alert('Selecione um status'); return $("#slct_status").focus() }
      axios.post('/admin/programacoes', programacao)
        .then(({data}) => {
          programacoes = [
            ...programacoes.filter(u => u.id != data.id),
            data
          ]
          $("#bt_novo").click()
          updateTable()
          alert("Cadastro atualizado com sucesso!")
        }).catch(e => {
          alert("Estamos com problemas!")
          console.error(e)
        })
    })
    $("#bt_novo").click(() => {
      $("#txt_id").val('');
      $("#txt_nome").val('');
      $("#txt_descricao").val('');
      $("#slct_dia").val('');
      $("#txt_horario").val('');
      $("#slct_status").val('1');
      $("#txt_nome").focus();
    })
    $("#bt_novo").click()
    updateTable()
  })
  function updateTable () {
    $("#tbl_registros tbody").html(programacoes
      .sort((a, b) => a.dia_semana == b.dia_semana ? (a.horario < b.horario ? -1 : 1) : (a.dia_semana < b.dia_semana ? -1 : 1))
      .map(u => `<tr reg-id="${u.id}">
      <td>${u.nome}</td>
      <td>${['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'][u.dia_semana]}</td>
      <td>${u.horario}</td>
      <td>
        <button class="btn btn-primary btn-sm bt_editar">Editar</button>
        <button class="btn btn-outline-danger btn-sm bt_excluir">Excluir</button>
      </td>
    </tr>`))
    $("#tbl_registros .bt_editar").click(function () {
      let id = $(this).parents('tr').attr('reg-id')
      let programacao = programacoes.find(u => u.id == id)
      if (!programacao) {
        return alert("Usuário inválido!")
      }
      $("#txt_id").val(programacao.id);
      $("#txt_nome").val(programacao.nome);
      $("#txt_descricao").val(programacao.descricao);
      $("#slct_dia").val(programacao.dia_semana);
      $("#txt_horario").val(programacao.horario);
      $("#slct_status").val(programacao.ativo);
      $("#txt_nome").focus();
    })
    $("#tbl_registros .bt_excluir").click(function () {
      if (confirm("Deseja, realmente, remover esse registro?")) {
        let id = $(this).parents('tr').attr('reg-id')
        if ($("#txt_id").val() == id)
          $("#bt_novo").click()
        axios.delete('/admin/programacoes', { params: { id } })
          .then(({data}) => {
            alert("Programação removida com sucesso!")
            programacoes = programacoes.filter(u => u.id != id)
            updateTable()
          }).catch(e => {
            alert("Estamos com problemas!!")
            console.error(e)
          })
      }
    })
  }
</script>