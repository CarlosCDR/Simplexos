<!DOCTYPE html>
<html lang="pt-br">

<head>
  <title><?= $this->config->item('app_name') ?> </title>
  <meta charset="UTF-8" />
  <meta name="author" content="Kodinger">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrapcdn.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="<?= base_url() ?>assets/css/loginteste.css" />
  <script src="<?= base_url() ?>assets/js/jquery-1.12.4.min.js"></script>
  <script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
</head>

<body class="my-login-page">
  <div class="my-login-page">
    <div id="loginbox">
      <form class="form-vertical" id="formLogin" method="post" action="<?= site_url('login/verificarLogin') ?>">
        <?php if ($this->session->flashdata('error') != null) { ?>
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <?= $this->session->flashdata('error'); ?>
          </div>
    </div>
  <?php } ?>
  <section class="h-100">
    <div class="container h-100">
      <div class="row justify-content-md-center h-100">
        <div class="card-wrapper">
          <div class="card fat">
            <div class="card-body">
              <h4 class="card-title">SIMPLEXOS</h4>
              <form method="POST" action="index.html" class="my-login-validation">
                <div class="form-group">
                  <label for="email">E-Mail Address</label>
                  <input id="email" type="email" class="form-control" name="email" value="" required autofocus>
                  <div class="invalid-feedback">
                    Email is invalid
                  </div>
                </div>

                <div class="form-group">
                  <label for="password">Password
                  </label>
                  <input id="password" type="password" class="form-control" name="senha" required data-eye>
                  <div class="invalid-feedback">
                    Password is required
                  </div>
                </div>

                <div class="form-group">
                  <div class="custom-checkbox custom-control">
                    <input type="checkbox" name="remember" id="remember" class="custom-control-input">
                    <label for="remember" class="custom-control-label">Remember Me</label>
                  </div>
                </div>

                <div class="form-group m-0">
                  <button type="submit" id="btn-acessar" class="btn btn-primary btn-block" data-target="#notification">
                    Login
                  </button>
                </div>

                <div class="footer">
                  Copyright&copy; <?= date('Y'); ?> &mdash; NEWSPX
                  <div id="mcell">Versão: <?= $this->config->item('app_version'); ?>
              </form>
            </div>
          </div>

        </div>
      </div>
    </div>
    
  <!-- Copyright -->
</footer>
<!-- Footer -->
  </section>
  <!-- em construcao -->
  <!-- Button to Open the Modal -->
  <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Open modal
</button> -->

  <!-- The Modal -->
  <a href="#notification" id="call-modal" role="button" class="btn" data-toggle="modal" style="display: none ">notification</a>
  <div class="modal" id="notification">
    <div class="modal-dialog">
      <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">SIMPLEXOS</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
          Email e/ou senha incorretos.
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
  <!-- Remove the container if you want to extend the Footer to full width. -->
<div class="container my-5">
</div>
  <script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>assets/js/validate.js"></script>
  <script src="<?= base_url() ?>assets/js/remembeme.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#email').focus();
      $("#formLogin").validate({
        rules: {
          email: {
            required: true,
            email: true
          },
          senha: {
            required: true
          }
        },
        messages: {
          email: {
            required: '',
            email: 'Insira um Email válido'
          },
          senha: {
            required: 'Campos Requeridos.'
          }
        },
        submitHandler: function(form) {
          var dados = $(form).serialize();
          $('#btn-acessar').addClass('disabled');
          $('#progress-acessar').removeClass('hide');

          $.ajax({
            type: "POST",
            url: "<?= site_url('login/verificarLogin?ajax=true'); ?>",
            data: dados,
            dataType: 'json',
            success: function(data) {
              if (data.result == true) {
                window.location.href = "<?= site_url('Simplexos'); ?>";
              } else {


                $('#btn-acessar').removeClass('disabled');
                $('#progress-acessar').addClass('hide');

                $('#message').text(data.message || 'Os dados de acesso estão incorretos, por favor tente novamente!');
                $('#call-modal').trigger('click');
              }
            }
          });

          return false;
        },

        errorClass: "help-inline",
        errorElement: "span",
        highlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).parents('.control-group').removeClass('error');
          $(element).parents('.control-group').addClass('success');
        }
      });
    });
  </script>
</body>

</html>