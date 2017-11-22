<?php
  echo '<!DOCTYPE html><html lang="en">';

  include_once("head.php");
  include_once("classes/Moderador.class.php");
  include_once("classes/Instituicao.class.php");
  include_once("classes/ControleInstituicao.class.php");
  include_once("classes/ControleModerador.class.php");

  $mod = new Moderador();
  $cm = new ControleModerador();
  if (isset($_GET["id"]))
  {
    $mod = $cm->selecionarPorId($_GET["id"]);
  }

$funcoes = array("Professor", "Facilitador", "Outra Função");
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastrar Moderador</div>
      <div class="card-body">
        <form method="post" action="processaModerador.php">
            <input name="id" type="hidden" value="<?php echo $mod->getId(); ?>">
          <div class="form-group">
            <label for="nome">Nome do Moderador</label>
            <input class="form-control" name="nome" type="text" placeholder="Digite o nome" required="required" value="<?php echo $mod->getNome(); ?>">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="data_nasc">Data de Nascimento</label>
                  <input class="form-control" name="data_nasc" type="date" required="required"  value="<?php echo $mod->getData_nasc(); ?>">
              </div>
              <div class="col-md-6">
                <label for="idade">Idade</label>
                <input class="form-control" name="idade" type="number" readonly>
              </div>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                  <label for="instituicao">Instituição</label>
                  <select name="instituicao" class="form-control form-control-sm">
                    <option value="">Selecione</option>
                    <?php
                      $ci = new ControleInstituicao();
                      $insts = $ci->selecionar();
                      if (is_array($insts) || is_object($insts))
                      {
                        foreach ($insts as $inst) {
                          if ($mod->getInstituicao()->getId() == $inst->getId())
                          {
                            echo "<option value='".$inst->getId()."' selected='selected'>".$inst->getNome()."</option>";
                          }
                          else
                          {
                            echo "<option value='".$inst->getId()."'>".$inst->getNome()."</option>";
                          }
                        }
                      }
                    ?>
                  </select>
              </div>
              <div class="col-md-6">
                <br>
                <a class="btn btn-primary" href="cadastrainstituicao.php">Inserir Instituição</a>
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="funcao">Função</label>
            <select name="funcao" id="funcao" class="form-control form-control-sm" required="required">
              <option value="">Selecione</option>
              <?php
                foreach ($funcoes as $funcao) {
                  if ($mod->getFuncao() == $funcao)
                  {
                    echo "<option value='".$funcao."' selected='selected'>".$funcao."</option>";
                  }
                  else
                  {
                    echo "<option value='".$funcao."'>".$funcao."</option>";
                  }
                }
              ?>
            </select>
          </div>
          <div class="form-group">
            <label for="Email">Email</label>
            <input class="form-control" name="email" type="email" placeholder="Digite o Email" required="required" value="<?php echo $mod->getEmail(); ?>">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="data_ini">Período de Moderação</label>
                <input class="form-control" name="data_ini" type="date" required="required"  value="<?php echo $mod->getData_ini(); ?>">
              </div>
              <div class="col-md-6">
                <label for="data_fim">a</label>
                <input class="form-control" name="data_fim" type="date" placeholder="Digite o data_fim" required="required"  value="<?php echo $mod->getData_fim(); ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="descricao">Descrição da Experiência</label>
            <textarea class="form-control" name="descricao" type="text" placeholder="Digite o descricao"><?php echo $mod->getDescricao(); ?></textarea>
          </div>
          <div class="form-group">
            <label for="protocolo">Protocolo</label>
            <input class="form-control" name="protocolo" type="text" value="<?php echo $mod->getProtocolo(); ?>" readonly>
          </div>
          <?php
            if (isset($_GET["id"]))
            {
              echo '<input type="submit" name="botao" value="Alterar" class="btn btn-primary">';
              // echo '<input type="submit" name="botao" value="Deletar" class="btn btn-primary">';
              echo '<a class="btn btn-primary"  style="background-color:red;" href="processaModerador.php?id='.$mod->getId().'">Deletar</a>';
            }
            else
            {
              echo '<input type="submit" name="botao" value="Cadastrar" class="btn btn-primary">';
            }
          ?>
          <a class="btn btn-primary" href="moderadores.php">Cancelar</a>
        </form>
      </div>
    </div>
  </div>
  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
