<!-- Page Heading -->
<div class="row">
    <div class="col-lg-12">
        <h3 class="page-header">
            Users
        </h3>
    </div>
</div>
<div align="right"><a hre="#" class="btn btn-primary js-add_user" data-toggle="modal" data-target="#myModal-add_user">Add User</a></div>
<!-- /.row -->
<div class="row">
    <div class="col-lg-12">
        <form name="user_filter" method="post" role="form">
            <div class="row form-group">
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[name]" value="<?php echo $filter['name']?>" placeholder="Name">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[email_id]" value="<?php echo $filter['email_id']?>" placeholder="Email Id">
                </div>
                <div class="col-lg-3">
                    <input class="form-control" type="text" name="filter[contact_number]" value="<?php echo $filter['contact_number']?>" placeholder="Contact Number">
                </div>
                <div class="col-lg-3">
                    <a href="#" class="btn btn-primary js-filter_user">Filter</a>
                    <a href="#" class="btn btn-default js-reset_filter_user" onclick="document.getElementById('filter_reset').value = 1;">
                        Reset
                    </a>
                </div>
                <input class="form-control" type="hidden" name="filter[reset]" vaue="0" id="filter_reset">
            </div>
        </form>
    </div>
</div>
<!-- Modal Box -->
<div class="row">
    <div class="col-lg-12">
        <div class="table-responsive" id="js-user_inner_content">
            
        </div>
    </div>    
</div>

<div class="modal fade" id="myModal-add_user" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Add User</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" id="js-modal_close" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary js-update_user" >Save changes</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(".js-add_user").off('click').click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $('.modal-body').html('');
        $.ajax ({
            type: "post",
            url: '<?=base_url()?>admin_users/addUser',
            success: function(result) {
                if(result) {
                    $('.modal-body').html(result);
                }
            }
        })
    });

    $(".js-filter_user").click(function(){
    $('#js-user_inner_content').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        document.getElementById('filter_reset').value = 0;
        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_users/viewPaginatedUsers',
            success: function(result) {
                if(result) {
                    $('#js-user_inner_content').html(result);
                }
            }
        })
    });

    $(".js-filter_user").trigger('click');

    $(".js-reset_filter_user").click(function(){
    $('#js-user_inner_content').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        $.ajax ({
            type: "post",
            data: $( "form" ).serialize(),
            url: '<?=base_url()?>admin_users/viewPaginatedUsers',
            success: function(result) {
                if(result) {
                    $('#js-user_inner_content').html(result);
                }
            }
        })
    });

    $(".js-update_user").click(function(){
    $('.modal-body').html('<div align="center"><img align="center" src="<?=base_url()?>public/images/load.gif"></div>');
        if( '' == $("#js-user_id").val() )
            action = 'insertUser';
        else
            action = 'updateUser';

        $.ajax ({
            type: "post",
            data: $( "#edit_user" ).serialize(),
            url: '<?=base_url()?>admin_users/' + action,
            success: function(result) {
                output = JSON.parse(result);
                if( 'success' == output.type ) {
                    $( "#js-modal_close" ).trigger( "click" );
                    loadTab('<?=base_url()?>admin_users')
                } else {
                    alert( output.message )
                }
            }
        })
    });

</script>