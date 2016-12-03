<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('tieptan/head') ?>
</head>
<body>
    <div class=""> 
        <div class="container">
            <div class="row">
                <div class="col-md-2 left-col">
                    <?php $this->load->view('tieptan/left') ?>
                </div>
                <div class="col-md-10 right-col">
                    <?php $this->load->view('tieptan/header') ?>
                    
                    <div class="container content">
                        <?php $this->load->view($temp, $this->data); ?>
                    </div><!--.content-->
                </div><!--.right-col-->
            </div><!--t row-->
        </div>
        <div class="clearfix"></div>
        
    </div>
    <?php $this->load->view('tieptan/footer') ?>
</body>
</html>