<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <form id="data-form" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nama Kategori</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$detail['name']?>" name="name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <input type="text" class="form-control" value="<?=$detail['description']?>" name="description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Tipe</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="type">
                        <?php foreach ($this->typeArr as $key => $value) :?>
                            <option value='<?=$key?>' <?=($detail['type']==$key?'selected':'')?>><?=$value?></option>
                        <?php endforeach?>
                    </select>
                    </div>
                </div>
            </form>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" onclick="save()" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view("template/footer");?>
<script>
    $(document).ready(function() {
    });
    function save(){
        $.ajax({
            url : '<?=site_url($this->pageInfo['table_base'] . '/process_update/'. $id);?>',
            type: "POST",
            data: {
                'data-form' :$("#data-form").serialize(),
                csrf_test_name: $.cookie('csrf_cookie_name')
            },
            dataType: "JSON",
            success: function(data)
            {
                window.location='<?=site_url($this->pageInfo['table_base']);?>';
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error : ' + errorThrown);
            }
        });
    }
</script>