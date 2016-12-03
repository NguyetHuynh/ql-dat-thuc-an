<!DOCTYPE html>
<html>
<head>
    <?php $this->load->view('waiter/head') ?>
</head>
<body>
    <div class="container-fluid">
    
            <?php $this->load->view($temp, $this->data); ?>
        <div class="clearfix"></div>
    </div>
    <?php $this->load->view('waiter/footer') ?>    
</body>
</html>