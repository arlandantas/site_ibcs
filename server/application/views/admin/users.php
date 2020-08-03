<div class="row">
  <div class="col-md-12">
    <div class="card-body">
      <h5 class="card-title">Cadastro</h5>
      <div class="row">
        <div class="col-md-12">
          <input type="hidden" class="form-control" name="id" id="txt_id">
          <div class="form-group">
            <label for="txt_name">Nome:</label>
            <input type="text" class="form-control" name="name" id="txt_name">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="txt_username">Usuário:</label>
            <input type="text" class="form-control" name="username" id="txt_username">
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <!-- <label for="bt_password">Senha:</label><br>
            <button id="bt_password" class="btn btn-danger" style="width: 100%">Redefinir senha</button> -->
            <label for="txt_password">Senha:</label><br>
            <input type="password" class="form-control" id="txt_password">
            <small class="form-text text-muted">Deixe vazio para manter a senha antiga.</small>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="txt_permissoes">Permissões:</label><br>
            <!-- <input id="txt_permissoes" type="text" class="form-control" name="permissoes" /> -->
            <select id="txt_permissoes" class="form-control">
              <option value="*">Acesso Total</option>
            </select>
          </div>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <label for="slct_status">Status:</label><br>
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
            <th>Usuário</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </div>
  </div>
</div>
<script>
  let users = <?= json_encode($users) ?>;
  $(document).ready(function () {
    $("#bt_salvar").click(() => {
      let user = {
        id: $("#txt_id").val(),
        name: $("#txt_name").val(),
        username: $("#txt_username").val(),
        password: $("#txt_password").val(),
        permissoes: $("#txt_permissoes").val(),
        ativo: $("#slct_status").val(),
      }
      if (!user.name) { alert('Insira um nome válido'); return $("#txt_name").focus() }
      if (!user.username) { alert('Insira um nome válido'); return $("#txt_username").focus() }
      if (!user.permissoes) { alert('Selecione uma permissão válida'); return $("#txt_permissoes").focus() }
      if (!user.ativo) { alert('Selecione um status'); return $("#slct_status").focus() }
      if (!user.id && !user.password) {
        alert("Você precisa definir uma senha para o novo usuário!")
        return $("#txt_password").focus()
      }
      axios.post('/admin/users', user)
        .then(({data}) => {
          users = [
            ...users.filter(u => u.id != data.id),
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
      $("#txt_name").val('');
      $("#txt_username").val('');
      $("#txt_password").val('');
      $("#txt_permissoes").val('*');
      $("#slct_status").val('1');
      $("#txt_name").focus();
    })
    $("#bt_novo").click()
    updateTable()
  })
  function updateTable () {
    $("#tbl_registros tbody").html(users.sort((a, b) => a.name < b.name ? -1 : 1).map(u => `<tr reg-id="${u.id}">
      <td>${u.name}</td>
      <td>${u.username}</td>
      <td>
        <button class="btn btn-primary btn-sm bt_editar">Editar</button>
        <button class="btn btn-outline-danger btn-sm bt_excluir">Excluir</button>
      </td>
    </tr>`))
    $("#tbl_registros .bt_editar").click(function () {
      let id = $(this).parents('tr').attr('reg-id')
      let user = users.find(u => u.id == id)
      if (!user) {
        return alert("Usuário inválido!")
      }
      $("#txt_id").val(user.id);
      $("#txt_name").val(user.name);
      $("#txt_password").val('');
      $("#txt_username").val(user.username);
      $("#txt_permissoes").val(user.permissoes);
      $("#slct_status").val(user.ativo);
      $("#txt_name").focus();
    })
    $("#tbl_registros .bt_excluir").click(function () {
      if (confirm("Deseja, realmente, remover esse registro?")) {
        let id = $(this).parents('tr').attr('reg-id')
        if ($("#txt_id").val() == id)
          $("#bt_novo").click()
        axios.delete('/admin/users', { params: { id } })
          .then(({data}) => {
            alert("Usuário removido com sucesso!")
            users = users.filter(u => u.id != id)
            updateTable()
          }).catch(e => {
            alert("Estamos com problemas!!")
            console.error(e)
          })
      }
    })
  }
</script>