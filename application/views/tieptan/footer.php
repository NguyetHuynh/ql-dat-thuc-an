<footer class="footer">
        <div class="container">
            <p>&copy; Nguyet Huynh 2016</p>
        </div>
    </footer>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo public_url() ?>/script/jquery.number.min.js"></script>
<script src="<?php echo public_url() ?>/script/main-script.js"></script>
<script>
    function deleteConfirm()
    {
        job=confirm('Bạn có chắc là muốn xóa?');
        if(job!=true)
        {
            return false;
        }
    }

    </script>