<?php if(isset($message) && $message):?>
<div class="alert alert-success message">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Thông Báo:</strong> <?php echo $message ?>.
</div>
<?php endif;?>
