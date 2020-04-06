<?php

/**
 * @var \CodeIgniter\view\View $this
 */
$this->extend('Ci4adminrbac\Views\admin\layouts\index');
?>
<?php $this->section('main-content'); ?>
<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <div class="card">

      <div class="card-body">
        <?php
        if (ENVIRONMENT != 'production') {
          var_dump($this->getData()['debugs']);
        }
        ?>
      </div>
    </div>

  </div> <!-- /.container-fluid -->
</section>
<!-- /.content -->
<?php $this->endSection(); ?>