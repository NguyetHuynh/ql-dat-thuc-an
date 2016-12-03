<?php $this->load->view('admin/doanhthu/head');?>
<div class="container">
    <div class="row">
        <div class="col-md-12 tb-data panel">
            <table id="dataTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <caption>Doanh Thu Theo Ngày</caption>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngày</th>
                        <th>Doanh Thu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1;
                        foreach ($list as $row):?>
                    <tr>
                        <td><?php echo $i; $i++; ?></td>
                        <td><?php echo $row->ngaythu ?></td>
                        <td><?php echo number_format($row->total)?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div><!--.tb-data-->
    </div>
</div><!--.content-->
