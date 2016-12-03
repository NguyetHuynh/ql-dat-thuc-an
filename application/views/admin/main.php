<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('admin/head'); ?>
</head>
<body>
    <div id="main">        
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-col ">
                    <?php $this->load->view('admin/left') ?>
                </div><!--.left-col-->
                <div class="col-md-10 right-col">
                    <?php $this->load->view('admin/header') ?>
                    <div class="container right-col-content">
                        <?php $this->load->view($temp, $this->data); ?>
                    </div><!--.content-->
                </div><!--.right-col-->
            </div><!--t row-->
        </div>
        <div class="clearfix"></div>
        
    </div>
    <?php $this->load->view('admin/footer') ?>
</body>
</html>