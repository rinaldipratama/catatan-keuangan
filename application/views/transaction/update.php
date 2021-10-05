<?php $this->load->view("template/header");?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-sm-offset-2">
            <form id="data-form" class="form-horizontal">
                <div class="form-group">
                    <label class="col-sm-2 control-label">Nominal</label>
                    <div class="col-sm-10">
                    <input type="number" value="<?=$detail['nominal']?>" class="form-control" name="nominal">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Deskripsi</label>
                    <div class="col-sm-10">
                    <input type="text" value="<?=$detail['description']?>" class="form-control" name="description">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">Kategori</label>
                    <div class="col-sm-10">
                    <select class="form-control" name="category_id">
                        <?php foreach ($category as $key) :?>
                            <option value='<?=$key['category_id']?>' <?=($detail['category_id']==$key['category_id']?'selected':'')?>>[<?=$key['type']?>] <?=$key['name']?></option>
                        <?php endforeach?>
                    </select>
                    </div>
                </div>
            </form>
            <div class="col-sm-offset-2 col-sm-10">
                <button type="button" onclick="save()" class="btn btn-default">Save</button>
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