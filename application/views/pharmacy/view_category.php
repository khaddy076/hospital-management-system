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
     <script src="<?php echo base_url(); ?>assets/js/ajax_jquery.js"></script>
    <!--end of page level css-->
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
                Medicine Category
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('welcome/dashboard'); ?>">
                        <i class="fa fa-fw ti-home"></i> Dashboard
                    </a>
                </li>
                <li><a href="#"> Pharmacy</a></li>
                <li class="active">
                    View Category
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
                                 <button class="button button-rounded button-primary-flat hvr-hang">
                                     <i class="fa fa-fw ti-list"></i>  Category List
                                </button>
                            </div>
                            <div class="tools pull-right"></div>
                        </div>
                        <div class="pull-right" style="margin:8px;">
                            <a href="<?php echo base_url('pharmacy/createCategory'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus icon-plus"></i> Create Medicine Category</a>
                        </div>
                        <br />
                        <div class="clearfix"></div>
                        <?php
                            if($this->session->flashdata('success')){ ?>
                            <div class="alert alert-success col-sm-offset-3" style="padding-left:4.45%;width:45%;"><?php echo $this->session->flashdata('success') ?></div>
                            <?php } ?>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped" id="table1">
                                    <thead>
                                    <tr>
                                        <th>S/N</th>
                                        <th>Category Name</th>
                                        <th>Category Description</th>
                                        <th>Date Created</th>
                                        <th>Date Modified</th>
                                        <th>Modifier</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <?php 
                                        if($data_category == 'no result'){ ?>
                                        <div class="alert alert-danger"> No record found... </div>
                                    <?php  }else{ ?>

                                    
                                    <tbody>
                                        <?php
                                        $i = 1;
                                            foreach($data_category as $category):
                                        ?>
                                    <tr>
                                        <td><?php echo $i; $i++; ?></td>
                                        <td><?php echo $category->category_name; ?></td>
                                        <td><?php echo $category->description; ?></td>
                                        <td><?php echo $category->date_created; ?></td>
                                        <td><?php echo $category->date_modified; ?></td>
                                        <td><?php echo $category->modifier; ?></td>
                                        <td>
                                            <?php 

                                            if($permission != 'admin'){ ?>
                                                <button type="button" class="btn btn-icon btn-primary btn-round m-r-10" data-toggle="modal" data-target="#edit_<?php echo $category->id; ?>" data-placement="top" disabled><i class="icon fa fa-fw ti-pencil" aria-hidden="true"></i></button>
                                                <button type="button" class="btn btn-icon btn-danger btn-round m-r-10" data-toggle="modal" data-target="#delete_<?php echo $category->id; ?>" data-placement="top" disabled><i class="icon fa fa-fw ti-trash" aria-hidden="true"></i></button>
                                          <?php  }else{ ?>
                                                <button type="button" class="btn btn-icon btn-primary btn-round m-r-10" data-toggle="modal" data-target="#edit_<?php echo $category->id; ?>" data-placement="top"><i class="icon fa fa-fw ti-pencil" aria-hidden="true"></i></button>
                                               <button type="button" class="btn btn-icon btn-danger btn-round m-r-10" data-toggle="modal" data-target="#delete_<?php echo $category->id; ?>" data-placement="top"><i class="icon fa fa-fw ti-trash" aria-hidden="true"></i></button>
                                          <?php  }  ?>
                                            
                                        </td>
                                    </tr>
                                    <div class="modal fade" id="edit_<?php echo $category->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                                                <label class="col-md-4 control-label" for="category_name">
                                                                    Category Name
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <input type="text" id="category_name<?php echo $category->id; ?>" name="category_name" class="form-control" placeholder="Enter Category Name" value="<?php echo $category->category_name; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12">
                                                            <div class="col-sm-3 form-group">
                                                                <label class="col-md-4 control-label" for="desc_info">
                                                                    Descripton
                                                                </label>
                                                            </div>
                                                            <div class="col-sm-8 form-group">
                                                                <textarea id="desc_info<?php echo $category->id; ?>" name="desc_info" rows="4" class="form-control resize_vertical" placeholder="Category short info "><?php echo $category->description; ?></textarea>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer ">
                                                    <button type="submit" class="btn btn-primary btn-block btn-md btn-responsive" tabindex="7" data-dismiss="modal" id="btnEdit<?php echo $category->id; ?>">
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
                                    <div class="modal fade" id="delete_<?php echo $category->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
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
                                                    <button type="click" class="btn btn-danger" data-dismiss="modal" onclick="deletecategory(<?php echo $category->id; ?>);">
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
                                            $('#btnEdit<?php echo $category->id; ?>').click(function(){

                                                var category = $('#category_name<?php echo $category->id; ?>').val(),
                                                    id = '<?php echo $category->id; ?>';
                                                    desc = $('#desc_info<?php echo $category->id; ?>').val();

                                                $.post('<?php echo base_url();?>pharmacy/edit/', {id: id, edit: 'editing',category_name: category,desc_info: desc },
                                                    function(result){
                                                    // console.log(result);
                                                    alert(result);
                                                    window.location.reload();
                                                });
                                            });

                                        });

                                        function deletecategory(id){
                                            $.post('<?php echo base_url();?>pharmacy/delete/' + id, {delete: 'deleting', task: 'category' },
                                              function(result){
                                                // console.log(result);
                                                alert(result);
                                                window.location.reload();
                                            });
                                        }

                                    </script>
                                    <?php endforeach; } ?>
                                    </tbody>
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

</body>
</html>








