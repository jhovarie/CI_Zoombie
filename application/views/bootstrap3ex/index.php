<!DOCTYPE html>
<html>
    <title></title>
    <head>
        <?php
        include_bootstrap3();
        ?>
        <link rel="stylesheet" type="text/css" href="<?=activetheme()?>/style.css"/>
    </head>
    <body>
        <?php $this->load->view('bootstrap3ex/navbar'); ?>
        <div class="container" style="min-height:500px">
            <div class="row">
                <div class="addblack col-md-12">
                    <h1>HELLO </h1>
                    <?php $this->load->view('bootstrap3ex/scriptloader'); ?>
                </div>
            </div>
        </div>
         <?php $this->load->view('bootstrap3ex/footer'); ?>
    </body>
</html>