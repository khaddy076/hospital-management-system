<?php
$user_data = check_all_access(); // this check all the necessary access to the system and permission
$get_settings = getsettingsdetails();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> <?php echo (get_ehm_title()) ? get_ehm_title() : 'EHM Dashboard' ; ?> </title>
       <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico"/>
  <!-- global css -->
  <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/A.app.css%2bcustom.css%2cMcc.Wh3kTlK9Vt.css.pagespeed.cf.Vq3xvtuJ3i.css"/>
  <!-- end of global css -->

    <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css%2c_app.css%2bvendors%2c_datatables%2c_css%2c_dataTables.bootstrap.css%2bvendors%2c_datatables%2c_css%2c_buttons.bootstrap.css%2bvendors%2c_datatables%2c_css%2c_colReorder.bootstrap.css%2bvendor"/>
    
    <style id="skin">.skin-default .sidebar a{color:#808b9c;-webkit-font-smoothing:antialiased}.skin-default .icon-list li a:hover{background:#eee}@media screen and (min-width:550px){.skin-default .navbar .navbar-right>.nav{margin-right:15px}}</style>
    <!--end of page level css-->
    
     <link href="<?php echo base_url() ; ?>assets/css/buttons_sass.css" rel="stylesheet">
    <!--end of page level css-->
    <script src="<?php echo base_url(); ?>assets/js/ajax_jquery.js"></script>
</head>
<body class="skin-default">
 --><!-- header logo: style can be found in header-->
<?php include 'includes/static-header.php'; ?>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('navigation/admin_nav'); ?>
   <aside class="right-side">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                View Notice Board
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('welcome/dashboard'); ?>">
                        <i class="fa fa-fw ti-home"></i> Dashboard
                    </a>
                </li>
                <li><a href="#"> Notice Board</a></li>
                <li class="active">
                    View Notice Board
                </li>
            </ol>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel filterable">
                        <div class="panel-heading clearfix  ">
                            <div class="panel-title pull-left">
                                <a href="<?php echo base_url('welcome/noticeboard'); ?>">
                                 <button class="button button-rounded button-primary-flat hvr-hang">
                                     <i class="fa fa-fw ti-list"></i>  Create Notice Board
                                </button></a>
                            </div>
                            <div class="tools pull-right"></div>
                        </div>
                        <div class="clearfix"></div>
                        <?php
                            if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success col-sm-offset-3" style="padding-left:4.45%;width:40%;"><?php echo $this->session->flashdata('success') ?></div>
                            <?php } ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Title</th>
                                        <th>Description</th>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Date Created</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <?php 
                                        if($data_notice == 'no result'){ ?>
                                        <div class="alert alert-danger"> No record found... </div>
                                    <?php  }else{ ?>

                                    <?php
                                    $i = 1;
                                        foreach($data_notice as $notice):
                                    ?>
                                    <tbody>
                                    <tr>
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $notice->title; ?></td>
                                        <td><?php echo $notice->description; ?></td>
                                        <td><?php if($notice->start_date != null){
                                            echo $notice->start_date;
                                        }else{
                                            echo 'Null';
                                        } ?></td>
                                        <td><?php if($notice->end_date){
                                            echo $notice->end_date;
                                        }else{
                                            echo 'Null';
                                        } ?></td>
                                        <td><?php echo $notice->date_created; ?></td>
                                        <td>
                                            <?php 

                                            if($permission != 'admin'){ ?>
                                                <button type="button" class="btn btn-icon btn-primary btn-round m-r-10" data-toggle="modal" data-target="#edit_<?php echo $notice->id; ?>" data-placement="top" disabled><i class="icon fa fa-fw ti-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-icon btn-danger btn-round m-r-10" data-toggle="modal" data-target="#delete_<?php echo $notice->id; ?>" data-placement="top" disabled><i class="icon fa fa-fw ti-trash" aria-hidden="true"></i></button>
                                          <?php  }else{ ?>
                                                <button type="button" class="btn btn-icon btn-primary btn-round m-r-10" data-toggle="modal" data-target="#edit_<?php echo $notice->id; ?>" data-placement="top"><i class="icon fa fa-fw ti-pencil" aria-hidden="true"></i></button>
                                               <button type="button" class="btn btn-icon btn-danger btn-round m-r-10" data-toggle="modal" data-target="#delete_<?php echo $notice->id; ?>" data-placement="top"><i class="icon fa fa-fw ti-trash" aria-hidden="true"></i></button> 
                                          <?php  }  ?>
                                            
                                        </td>
                                    </tr>
                                    </tbody>
                                    <div class="modal fade" id="edit_<?php echo $notice->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form method="post" id="edit_data_form">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title custom_align" id="Heading5">Update this entry </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="col-md-4 control-label" for="title">
                                                                    Title
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <input type="text" id="title<?php echo $notice->id; ?>" name="title" class="form-control" placeholder="Title" value="<?php echo $notice->title; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="col-md-4 control-label" for="description">
                                                                    Descripton
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <textarea id="description<?php echo $notice->id; ?>" name="description" rows="4" class="form-control resize_vertical" placeholder="notice short info "><?php echo $notice->description; ?></textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="col-md-4 control-label" for="start_date">
                                                                    Start Date
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-fw ti-calendar"></i>
                                                                    </div>
                                                                    <input class="form-control" id="datetime20" name="start_date_<?php echo $notice->id; ?>" size="40" placeholder="YYYY-MM-DD" value="<?php echo $notice->start_date; ?>">
                                                                </div>
                                                            </div> 
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="col-md-4 control-label" for="end_date">
                                                                    End Date
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <div class="input-group">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-fw ti-calendar"></i>
                                                                    </div>
                                                                    <input class="form-control" id="datetime201" name="end_date_<?php echo $notice->id; ?>" size="40" placeholder="YYYY-MM-DD" value="<?php echo $notice->start_date; ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <div class="modal-footer ">
                                                    <button type="submit" class="btn btn-primary btn-block btn-md btn-responsive" tabindex="7" data-dismiss="modal" id="btnEdit<?php echo $notice->id; ?>">
                                                        <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                                    </button>
                                                    <button type="button" class="btn btn-success btn-block btn-md btn-responsive" tabindex="7" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remove"></span> No
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <div class="modal fade" id="delete_<?php echo $notice->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="" method="post">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                                    <h4 class="modal-title custom_align" id="Heading5">Delete this entry </h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="alert alert-info">
                                                        <span class="glyphicon glyphicon-info-sign"></span>&nbsp; Are you sure you want to
                                                        delete this record ?
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="click" class="btn btn-danger" data-dismiss="modal" onclick="deleteNotice(<?php echo $notice->id; ?>);">
                                                        <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                                    </button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">
                                                        <span class="glyphicon glyphicon-remove"></span> No
                                                    </button>
                                                </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <script>

                                        $(document).ready(function(){
                                            $('#btnEdit<?php echo $notice->id; ?>').click(function(){

                                                var start_date = $('input[name="start_date_<?php echo $notice->id; ?>"]').val(),
                                                    end_date = $('input[name="end_date_<?php echo $notice->id; ?>"]').val(),
                                                    title = $('#title<?php echo $notice->id; ?>').val(),
                                                    description = $('#description<?php echo $notice->id; ?>').val(),
                                                    id = '<?php echo $notice->id; ?>';

                                                $.post('<?php echo base_url();?>welcome/notice_edit/', {id: id, edit: 'editing',title: title,description: description,start_date: start_date,end_date:end_date },
                                                    function(result){
                                                    // console.log(result);
                                                    alert(result);
                                                    window.location.reload();
                                                });
                                            });

                                        });

                                        function deleteNotice(id){

                                            $.post('<?php echo base_url();?>welcome/delete_welcome_general/' + id, { delete: 'deleting' },
                                              function(result){
                                                // console.log(result);
                                                alert(result);
                                                window.location.reload();

                                            });
                                        }
                                    </script>
                                    <?php endforeach; } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="background-overlay"></div>
        </section>
    </aside>
    <!-- /.right-side -->
</div>

<script type="text/javascript" src="<?php echo base_url() ; ?>assets/vendors/Buttons/js/buttons.js"></script>

    <!--end of page level css-->
<!-- global js -->
<div id="qn"></div>
<?php include (APPPATH . 'views/templates/footer_view.php'); ?>
<!-- <script src="<?php //echo base_url(); ?>assets/js/custom_js/advanced_datatables.js" type="text/javascript"></script> -->
<!-- end of page level js -->

</body>
</html>








