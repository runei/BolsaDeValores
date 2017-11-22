
<?php
  echo '<!DOCTYPE html><html lang="en">';

  include_once("head.php");
?>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->

<?php

  include_once("navbar.php");
?>


  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Instituições</li>
      </ol>
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <p style="float:left; vertical-align:middle;"><i class="fa fa-table"></i> Lista de Instituições</p>
          <a class="btn btn-primary" style="float:right;" href="cadastrainstituicao.php">Inserir</a></div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nome</th>
                  <th>CNPJ</th>
                  <th>CEP</th>
                  <th>Endereco</th>
                  <th>Numero</th>
                  <th>Complemento</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>UF</th>
                  <th>Tipo</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Nome</th>
                  <th>CNPJ</th>
                  <th>CEP</th>
                  <th>Endereco</th>
                  <th>Numero</th>
                  <th>Complemento</th>
                  <th>Bairro</th>
                  <th>Cidade</th>
                  <th>UF</th>
                  <th>Tipo</th>
                </tr>
              </tfoot>
              <tbody>

                <?php

                include_once("classes/Instituicao.class.php");
                include_once("classes/ControleInstituicao.class.php");

                $ci = new ControleInstituicao();
                $insts = $ci->selecionar();

                if (is_array($insts) || is_object($insts))
                {
                  foreach ($insts as $inst) {
                      // <td style='display:none;'>".$inst->getId()."</td>
                    echo "<tr class='clickable-row' data-href='cadastrainstituicao.php?id=".$inst->getId()."'>
                      <td>".$inst->getNome()."</td>
                      <td>".$inst->getCnpj()."</td>
                      <td>".$inst->getCep()."</td>
                      <td>".$inst->getEndereco()."</td>
                      <td>".$inst->getNumero()."</td>
                      <td>".$inst->getComplemento()."</td>
                      <td>".$inst->getBairro()."</td>
                      <td>".$inst->getCidade()."</td>
                      <td>".$inst->getUf()."</td>
                      <td>".$inst->getTipo()."</td>
                    </tr>";
                  }
                }

                ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2017</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
  </div>
</body>

</html>
