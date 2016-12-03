<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('chef/head'); ?>
</head>
<body>
    <div id="main">        
        <div class="container">
            <div class="row">

                    <?php $this->load->view('chef/header') ?>
                    <div class="container right-col-content">
                        <?php $this->load->view($temp, $this->data); ?>

            </div><!--t row-->
        </div>
        <div class="clearfix"></div>
        
    </div>
    <?php $this->load->view('chef/footer') ?>
</body>
</html>