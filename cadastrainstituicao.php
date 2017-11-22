<?php
  echo '<!DOCTYPE html><html lang="en">';

  include_once("head.php");
  include_once("classes/Instituicao.class.php");
  include_once("classes/ControleInstituicao.class.php");

  $inst = new Instituicao();
  $ci = new ControleInstituicao();
  if (isset($_GET["id"]))
  {
    $inst = $ci->selecionarPorId($_GET["id"]);
  }

$estados_br = array(
  'AC'=>'Acre',
  'AL'=>'Alagoas',
  'AP'=>'Amapá',
  'AM'=>'Amazonas',
  'BA'=>'Bahia',
  'CE'=>'Ceará',
  'DF'=>'Distrito Federal',
  'ES'=>'Espírito Santo',
  'GO'=>'Goiás',
  'MA'=>'Maranhão',
  'MT'=>'Mato Grosso',
  'MS'=>'Mato Grosso do Sul',
  'MG'=>'Minas Gerais',
  'PA'=>'Pará',
  'PB'=>'Paraíba',
  'PR'=>'Paraná',
  'PE'=>'Pernambuco',
  'PI'=>'Piauí',
  'RJ'=>'Rio de Janeiro',
  'RN'=>'Rio Grande do Norte',
  'RS'=>'Rio Grande do Sul',
  'RO'=>'Rondônia',
  'RR'=>'Roraima',
  'SC'=>'Santa Catarina',
  'SP'=>'São Paulo',
  'SE'=>'Sergipe',
  'TO'=>'Tocantins'
  );

$tipos = array("Universidade", "Aceleradora", "Extensão", "SEBRAE");
?>

<body class="bg-dark">
  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Cadastrar Instituição</div>
      <div class="card-body">
        <form method="post" action="processainstituicao.php">
            <input name="id" type="hidden" value="<?php echo $inst->getId(); ?>">
          <div class="form-group">
            <label for="nome">Nome da Instituição</label>
            <input class="form-control" name="nome" type="text" placeholder="Digite o nome" required="required" value="<?php echo $inst->getNome(); ?>">
          </div>
          <div class="form-group">
            <label for="cnpj">CNPJ</label>
            <input class="form-control" name="cnpj" type="text" placeholder="Digite o CNPJ" required="required" value="<?php echo $inst->getCnpj(); ?>" >
          </div>
          <div class="form-group">
            <label for="cep">CEP</label>
            <input class="form-control" name="cep" type="text" placeholder="Digite o CEP" required="required"  value="<?php echo $inst->getCep(); ?>">
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="endereco">Endereço</label>
                <input class="form-control" name="endereco" type="text" placeholder="Digite o endereço" required="required"  value="<?php echo $inst->getEndereco(); ?>">
              </div>
              <div class="col-md-6">
                <label for="numero">Numero</label>
                <input class="form-control" name="numero" type="number" placeholder="Digite o numero" required="required"  value="<?php echo $inst->getNumero(); ?>">
              </div>
            </div>
          </div>
          <div class="form-group">
            <label for="complemento">Complemento</label>
            <input class="form-control" name="complemento" type="text" placeholder="Digite o complemento"  value="<?php echo $inst->getComplemento(); ?>">
          </div>
          <div class="form-group">
            <label for="bairro">Bairro</label>
            <input class="form-control" name="bairro" type="text" placeholder="Digite o bairro" required="required" value="<?php echo $inst->getBairro(); ?>">
          </div>
          <div class="form-group">
            <label for="cidade">Cidade</label>
            <input class="form-control" name="cidade" type="text" placeholder="Digite o cidade" required="required" value="<?php echo $inst->getCidade(); ?>">
          </div>
          <div class="form-group"">
            <label for="uf" required="required">UF</label>
              <select name="uf" id="uf" class="form-control form-control-sm">
                <option value="">Selecione</option>
                <?php
                  foreach ($estados_br as $uf => $estado) {
                    if ($inst->getUf() == $uf)
                    {
                      echo "<option value='".$uf."' selected='selected'>".$estado."</option>";
                    }
                    else
                    {
                      echo "<option value='".$uf."'>".$estado."</option>";

                    }
                  }
                ?>
              </select>
            </div>
            <div class="form-group"">
            <label for="tipo">Tipo</label>
              <select name="tipo" id="tipo" class="form-control form-control-sm" required="required">
                <option value="">Selecione</option>
                 <?php
                  foreach ($tipos as $tipo) {
                    if ($inst->getTipo() == $tipo)
                    {
                      echo "<option value='".$tipo."' selected='selected'>".$tipo."</option>";
                    }
                    else
                    {
                      echo "<option value='".$tipo."'>".$tipo."</option>";
                    }
                  }
                ?>
              </select>
            </div>
            <?php
              if (isset($_GET["id"]))
              {
                echo '<input type="submit" name="botao" value="Alterar" class="btn btn-primary">';
                // echo '<input type="submit" name="botao" value="Deletar" class="btn btn-primary">';
                echo '<a class="btn btn-primary"  style="background-color:red;" href="processainstituicao.php?id='.$inst->getId().'">Deletar</a>';
              }
              else
              {
                echo '<input type="submit" name="botao" value="Cadastrar" class="btn btn-primary">';
              }
            ?>
          <a class="btn btn-primary" href="instituicoes.php">Cancelar</a>
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
