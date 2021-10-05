<?php $this->load->view("template/header");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <form id="filter-form" class="form-inline">
                <div class="form-group">
                    <label>Type</label>
                    <select class="form-control" name="type" onchange="return init_datatable()">
                        <option value="">All</option>
                        <option value="in">Pemasukan</option>
                        <option value="out">Pengeluaran</option>
                    </select>
                </div>
            </form>
            <table id="datatable" class="table"></table>
        </div>
    </div>
</div>
<?php $this->load->view("template/footer");?>
<script>
    $(document).ready(function() {
        init_datatable();
    });

    function init_datatable() {
        var serverSide = true;
        $('#datatable').DataTable({
            serverSide: serverSide,
            destroy: true,
            searching: false,
            ordering: false,
            ajax: {
                url: '<?=site_url($this->pageInfo['table_base'] . '/get_datatable/');?>',
                data: {
                    'server_side': serverSide,
                    'filter': $("#filter-form").serialize(),
                },
                type: 'POST'
            },
            columns: [
                {
                    data: 'name',
                    title: 'Kategori',
                },
                {
                    data: 'description',
                    title: 'Deskripsi',
                },
                {
                    data: 'type',
                    title: 'Type',
                },
                {
                    data: 'action',
                    title: '',
                },
            ]
        });
    }

    $('#datatable').on( "click", ".update-status", function(){
        $id = $(this).data('id');
        $status = $(this).data('status');
        //alert($status);
        $.ajax({
                url : '<?=site_url($this->pageInfo['table_base'] . '/update_status/');?>',
                type: "POST",
                data: {
                        id: $id,
                        status: $status,
                    },
                dataType: "JSON",
                success: function(data)
                {
                    init_datatable();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error : ' + errorThrown);
                }
        });
    });

</script>