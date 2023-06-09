<?php
$user_data = is_logged();
$get_settings = getsettingsdetails();
$this->session->set_userdata('referred_from', current_url());
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> <?php echo (get_ehm_title()) ? get_ehm_title() : 'EHM Dashboard' ; ?> </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" href="img/favicon.ico"/>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link type="text/css" href="<?php echo base_url(); ?>assets/css/A.app.css%2bcustom.css%2cMcc.Wh3kTlK9Vt.css.pagespeed.cf.Vq3xvtuJ3i.css" rel="stylesheet"/>
    <!-- end of global css -->
    <!--page level css -->

    <style id="skin">.skin-default .sidebar a{color:#808b9c;-webkit-font-smoothing:antialiased}.skin-default .icon-list li a:hover{background:#eee}@media screen and (min-width:550px){.skin-default .navbar .navbar-right>.nav{margin-right:15px}}</style>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/A.vendors%2c%2c_simple-line-icons%2c%2c_css%2c%2c_simple-line-icons.css%2bvendors%2c%2c_animate%2c%2c_animate.min.css%2bcss%2c%2c_custom_css%2c%2c_user_profile.css%2cMcc.7mNdQ0eL1J.css.pagespeed.cf.iRYiW"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/custom_css/radio_checkbox.css">

    <!--end of page level css-->
</head>

<body class="skin-default">
<!-- header logo: style can be found in header-->
<?php include 'includes/static-header.php'; ?>
<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <?php $this->load->view('navigation/admin_nav'); ?>
    <aside class="right-side">
        <!-- Content Header (Page header) -->

        <?php
        if($this->session->flashdata('success')){ ?>
            <div class="alert alert-success col-sm-offset-3" style="padding-left:4.45%;width:40%;"><?php echo $this->session->flashdata('success') ?></div>
        <?php } ?>


        <section class="content-header">
            <h1>
                Create ANC
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo base_url('welcome/dashboard'); ?>">
                        <i class="fa fa-fw ti-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    ANC
                </li>
                <li class="active">
                    Antenatal Assessment
                </li>
            </ol>
        </section>
        <?php
        foreach($data_patient as $patient):
            ?>
            <!-- Main content -->
            <section class="content">

                <!-- form opened -->
                <form method="post"
                      action="<?php echo base_url('casenote/create_direct_anc'); ?>
                                                    "   class="form-horizontal form-bordered">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel ">
                                <div class="panel-body">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="text-center mbl m-t-10">
                                                <img src="<?php echo base_url($patient->picture_path); ?>" alt="img" class="img-circle img-bor"/>
                                            </div>
                                        </div>
                                        <div class="profile_user">
                                            <h3 class="user_name_max"> <?php echo $patient->title; ?> <?php echo $patient->first_name, ' ', $patient->last_name; ?> <?php echo $patient->middle_name; ?></h3>


                                        </div>

                                        <!--                                    <div class="profile_user">-->
                                        <!--                                        <h3 style="color: brown"> Complaint </h3>-->
                                        <!--                                        <div class="form-group striped-col">-->
                                        <!--                                            <p>-->
                                        <!--                                                --><?php
                                        //                                                foreach($data_appointment as $appointment):
                                        //                                                ?>
                                        <!--                                                --><?php //echo $appointment->complaint; ?><!--</p>-->
                                        <!--                                            --><?php //endforeach; ?>
                                        <!---->
                                        <!--                                        </div>-->
                                        <!---->
                                        <!--                                    </div>-->


                                        <div class="profile_user">
                                            <h3 style="color: brown" > Personal Info </h3>
                                            <div class="form-group striped-col">
                                                <p><?php echo get_current_age($patient->dob); ?> | <?php echo $patient->gender; ?> | <?php echo $patient->marital_status ; ?></p>
                                                <p><?php echo $patient->email; ?> | <?php echo $patient->phone_no; ?></p>
                                                <p><?php echo $patient->lga; ?> | <?php echo $patient->occupation; ?></p>
                                                <p><?php echo $patient->address; ?></p>

                                            </div>

                                        </div>
                                        &nbsp;&nbsp;



                                    </div>
                                    <div class="col-md-8">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                <!-- Nav tabs -->
                                                <ul class="nav nav-tabs nav-custom">
                                                    <li class="active">
                                                        <a href="#tab-personal" data-toggle="tab">
                                                            <strong>Doctor in charge:

                                                                <?php echo $data_doctor->title; ?> <?php echo $data_doctor->first_name, ' ', $data_doctor->last_name; ?> <?php echo $data_doctor->middle_name; ?>



                                                            </strong>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- Tab panes -->
                                                <div class="tab-content nopadding noborder">
                                                    <div id="tab-personal" class="tab-pane animated fadeInRight fade in active">
                                                        <div class="col-sm-12">

                                                            <div class="row">
                                                                <?php
                                                                foreach($data_appointment as $appointment):
                                                                    ?>

                                                                    <label class="container striped-col">BOOKING DATE :    <?php echo ( $appointment->date_created); ?> </label>

                                                                <?php endforeach; ?>
                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="description">
                                                                        History of Pregnancy
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <textarea id="description" name="hop" rows="4" class="form-control resize_vertical" placeholder="Enter the information here ... ..." required="required"></textarea>
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label class="col-sm-3 control-label" for="description">
                                                                        Symptomps
                                                                    </label>
                                                                    <div class="col-sm-6">
                                                                        <textarea id="description" name="symptomp" rows="4" class="form-control resize_vertical" placeholder="Enter the information here ... ..." required="required"></textarea>
                                                                    </div>
                                                                </div>


                                                            </div>
                                                            <br/><br/>




                                                        </div> <!-- end of div -->
                                                    </div>

                                                </div>
                                                <!-- tab-content -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!--History-->



                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel ">
                                <div class="panel-body">

                                    <div class=" panel-widget">
                                        <div class="panel-heading">
                                        <span class="panel-title ">
<!--                                            <span class="pull-right">-->
                                            <!--                                    <i class="fa fa-fw ti-angle-up clickable"></i>-->
                                            <!--                                </span>-->
                                          <center><?php echo $patient->first_name; ?> Assessment</center>  </span>

                                        </div>

                                        <div class="panel-body profile_status">
                                            <!-- med history -->

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="panel ">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">
                                                                <i class="fa fa-fw ti-star"></i> Other Abnormalties
                                                            </h3>
                                                        </div>

                                                        <div class="panel-body">
                                                            <textarea id="description" name="abnormalties" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                        </div>

                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                    <div class="panel ">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title">
                                                                <i class="fa fa-fw ti-star"></i> Comments
                                                            </h3>
                                                        </div>

                                                        <div class="panel-body">
                                                            <div class="">
                                                                <textarea id="description" name="comments" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>

                                            </div>

                                            <!-- med history end -->



                                            <!-- summary -->

                                            <div class="row">
                                                <div class="col-md-6 col-md-offset-3">
                                                    <div class="panel ">
                                                        <div class="panel-heading">
                                                            <h3 class="panel-title "><center>
                                                                    <i class="fa fa-fw ti-star"></i> Pelvic Assessment ( 36 Weeks )
                                                                </center>
                                                            </h3>
                                                        </div>
                                                        <div class="panel-body">
                                                            <textarea id="description" name="pelvic" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                            <!-- summary end -->




                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>









                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel ">
                                                    <div class="panel-body">

                                                        <div class=" panel-widget panel-default">
                                                            <div class="panel-heading">
                                        <span class="panel-title ">
                                            <span class="pull-right">
                                    <i class="fa fa-fw ti-angle-up clickable"></i>
                                </span>
                                          <center><?php echo $patient->first_name; ?> Physical Examination </center>  </span>
                                                            </div>
                                                            <div class="panel-body profile_status">



                                                                <!-- General and systemic -->

                                                                <div class="row">


                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> General Condition
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <textarea id="description" name="general" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Oedema
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="">
                                                                                    <textarea id="description" name="oedema" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- General and systemic end -->


                                                                <!-- cardio and resp -->

                                                                <div class="row">


                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Anaemia
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <textarea id="description" name="anaemia" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Respiratory System
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="">
                                                                                    <textarea id="description" name="respiratory" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- cardio and resp  end -->


                                                                <!-- abd and urea -->

                                                                <div class="row">


                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Cardiovascular System
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <textarea id="description" name="cardiovascular" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Abdomen
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="">
                                                                                    <textarea id="description" name="abdomen" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                                </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!-- abd and urea end -->


                                                                <!-- cn and musc -->

                                                                <div class="row">


                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Spleen
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <textarea id="description" name="spleen" rows="3" class="form-control resize_vertical" placeholder="Enter the information here ..."></textarea>
                                                                            </div>

                                                                        </div>
                                                                    </div>



                                                                    <div class="col-md-6">
                                                                        <div class="panel ">
                                                                            <div class="panel-heading">
                                                                                <h3 class="panel-title">
                                                                                    <i class="fa fa-fw ti-star"></i> Gestational Age
                                                                                </h3>
                                                                            </div>
                                                                            <div class="panel-body">
                                                                                <div class="">

                                                                                    <input type="number" id="last_name" name="gestational" class="form-control" placeholder="Enter the information here ...">

                                                                                 </div>

                                                                            </div>
                                                                        </div>

                                                                    </div>

                                                                </div>

                                                                <!--  cn and muscsocial and drug history end -->




                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                    <!--End History-->




                    <input type="text"  name="booking_date"   value="<?php foreach($data_appointment as $appointment):  ?>
                            <?php echo ( $appointment->date_created); ?> <?php endforeach; ?>"  hidden>

                    <input type="text"  name="app_id"   value="<?php
                    foreach($data_appointment as $appointment):
                        ?>
                                                    <?php echo $appointment->id; ?>
                                                     <?php endforeach; ?>"  hidden>

                    <input type="text"  name="patient_id"   value="<?php echo $patient->id; ?>"  hidden>
                    <input type="text"  name="created_by"   value="<?php echo $data_doctor->id; ?>"  hidden>
                    <input type="text"  name="status"   value="0"  hidden>

                    <br> <br>
                    <div class="row">
                        <div class="form-group form-actions">
                            <div class="col-md-6 col-md-offset-5">
                                <button type="submit" class="btn btn-effect-ripple btn-primary" >Submit</button>
                                <button type="reset" class="btn btn-effect-ripple btn-default reset_btn">Reset
                                </button>
                            </div>
                        </div>
                    </div>


                </form>

                <!-- form closed -->


                <br> <br>



                <div class="row">
                    <div class="col-md-12">
                        <div class="panel ">
                            <div class="panel-body">

                                <div class="panel panel-widget panel-default">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="icon-list icons">

                                        </i><?php echo $patient->first_name; ?> Last Case Note</span>
                                    </div>
                                    <div class="panel-body profile_status">

                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table1">
                                                    <thead>
                                                    <tr>
                                                        <th>S/N</th>
                                                        <th>Patient Name</th>
                                                        <th>Complaint</th>
                                                        <th>Prescription</th>
                                                        <th>Description</th>
                                                        <th>Managed by</th>
                                                        <th>Date Created</th>
                                                        <th>Modified by</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <?php
                                                    if($data_cn == 'no result'){ ?>
                                                        <div class="alert alert-danger"> No record found... </div>
                                                    <?php  }else{ ?>

                                                    <?php
                                                    $i = 1;
                                                    foreach($data_cn as $cn):
                                                    ?>
                                                        <tbody>
                                                        <tr>
                                                            <td><?php echo $i; $i++; ?></td>
                                                            <td>
                                                                <?php
                                                                $patient_name = $this->Model_casenote->get_patient_by_id($cn->patient_id);
                                                                echo $patient_name->first_name;
                                                                ?>
                                                            </td>

                                                            <td><?php echo $cn->health_status ; ?></td>
                                                            <td><?php echo $cn->prescription ; ?></td>
                                                            <td><?php echo $cn->diagnosis ; ?></td>

                                                            <td> <?php
                                                                $patient_name = $this->Model_casenote->get_doctor_by_id($cn->created_by);
                                                                echo "Dr. ".$patient_name->first_name;
                                                                ?></td>
                                                            <td><?php echo $cn->date_created ; ?></td>
                                                            <td><?php if($cn->updated_by == ""){echo "not yet modified";}else{echo $cn->updated_by ;} ?></td>

                                                            <td>

                                                                <a href="
                                            <?php echo base_url('casenote/edit_casenote/'. $cn->id); ?>">
                                                                    <button class="btn btn-primary btn-xs" data-placement="top"><span class="fa fa-fw ti-pencil"></span></button>
                                                                </a>
                                                                <button class="btn btn-icon btn-danger btn-xs" data-toggle="modal" data-target="#delete_<?php echo $cn->id; ?>" data-placement="top"><i class="icon fa fa-fw ti-trash" aria-hidden="true" title="Cancel Appointment"></i></button>


                                                            </td>
                                                        </tr>
                                                        </tbody>
                                                        <div class="modal fade" id="delete_<?php echo $cn->id; ?>" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <form action="<?php echo base_url('casenote/delete'); ?>" method="post">
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
                                                                            <button type="click" class="btn btn-danger" data-dismiss="modal" onclick="deleteAppoint(<?php echo $cn->id; ?>);">
                                                                                <span class="glyphicon glyphicon-ok-sign"></span> Yes
                                                                            </button>
                                                                            <button type="button" class="btn btn-success" data-dismiss="modal">
                                                                                <span class="glyphicon glyphicon-remove"></span> No
                                                                            </button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                                /.modal-content
                                                            </div>
                                                            /.modal-dialog
                                                        </div>
                                                        <script>
                                                            function deleteAppoint(id){

                                                                $.post('<?php echo base_url();?>casenote/delete/' + id, { delete: 'deleting' },
                                                                    function(result){
                                                                        // console.log(result);
                                                                        location.reload();
                                                                        alert(result);

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
                        </div>
                    </div>
                </div>


                <!-- patient update data -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel ">
                            <div class="panel-body">

                                <div class="panel panel-widget panel-default">
                                    <div class="panel-heading">
                                        <span class="panel-title"> <i class="icon-list icons">

                                        </i><?php echo $patient->first_name; ?>'s Data</span>
                                    </div>
                                    <div class="panel-body profile_status">

                                        <div class="panel-body">
                                            <div class="table-responsive">
                                                <table class="table table-striped" id="table1">
                                                    <thead>
                                                    <tr>
                                                        <th>Genotype</th>
                                                        <th>Blood Group </th>
                                                        <th>Blood Pressure  </th>
                                                        <th>Weight</th>
                                                        <th>Height</th>
                                                        <th>Pulse</th>
                                                        <th>Temperature</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>

                                                    <tbody>
                                                    <tr>
                                                        <td><?php echo $patient->genotype; ?></td>
                                                        <td><?php echo $patient->blood_group; ?></td>
                                                        <td><?php echo $patient->blood_pressure; ?></td>
                                                        <td><?php echo $patient->weight; ?></td>
                                                        <td><?php echo $patient->height; ?></td>
                                                        <td><?php echo $patient->pulse; ?></td>
                                                        <td><?php echo $patient->body_temprature; ?></td>
                                                        <td>
                                                            <a href="
                                            <?php echo base_url('patient/edit_hd/'. $patient->id); ?>" type="button" class="btn btn-effect-ripple btn-primary" >UPDATE</>
                                                        </td>

                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>


                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                <div class="background-overlay"></div>
            </section>
        <?php endforeach; ?>
    </aside>
</div>
<!--wrapper ends-->
<style>
    /* The container */
    .container {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 22px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    /* Create a custom checkbox */
    .checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container:hover input ~ .checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container input:checked ~ .checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container input:checked ~ .checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container .checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    #description {
        width: 100%;
        min-height: 35px;
        overflow-y: hidden;
    }
</style>
<!-- global js -->

<script>
    $(function() {
        $('#description').on('keyup paste', function() {
            var $el = $(this),
                offset = $el.innerHeight() - $el.height();

            if ($el.innerHeight < this.scrollHeight) {
                //Grow the field if scroll height is smaller
                $el.height(this.scrollHeight - offset);
            } else {
                //Shrink the field and then re-set it to the scroll height in case it needs to shrink
                $el.height(1);
                $el.height(this.scrollHeight - offset);
            }
        });
    });
</script>

<script src="<?php echo base_url(); ?>assets/js/ajax_jquery.js"></script>
<script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>assets/js/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>assets/js/custom_js/radio_checkbox.js"></script>
<!-- end of global js -->
</body>

</html>




<!-- examination -->

<!--                                        <div class="row">-->
<!---->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="panel ">-->
<!--                                                    <div class="panel-heading">-->
<!--                                                        <h3 class="panel-title">-->
<!--                                                            <i class="fa fa-fw ti-arrow-circle-down"></i> Examinations-->
<!--                                                        </h3>-->
<!--                                                    </div>-->
<!--                                                    <div class="panel-body">-->
<!--                                                        <div class="box-body">-->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    General-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Systemic-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Cardio-vascular-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Respiratory-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!---->
<!---->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!---->
<!---->
<!--                                            <div class="col-md-6">-->
<!--                                                <div class="panel ">-->
<!--                                                    <div class="panel-heading">-->
<!--                                                        <h3 class="panel-title">-->
<!--                                                            <i class="fa fa-fw ti-arrow-circle-down"></i> Examinations-->
<!--                                                        </h3>-->
<!--                                                    </div>-->
<!--                                                    <div class="panel-body">-->
<!--                                                        <div class="box-body">-->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Abdominal-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Urea Genital Tract-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Central Nervous System-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!---->
<!--                                                            <div class="form-group">||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue"  />-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    Muscular SkeletaL System-->
<!--                                                                </label>  ||-->
<!--                                                                <label>-->
<!--                                                                    <input type="checkbox" class="square-blue" checked/>-->
<!--                                                                </label>-->
<!--                                                                <label class="m-l-10">-->
<!--                                                                    NAD  ||-->
<!--                                                                </label>-->
<!---->
<!--                                                            </div>-->
<!---->
<!---->
<!--                                                        </div>-->
<!--                                                    </div>-->
<!--                                                </div>-->
<!--                                            </div>-->
<!---->
<!--                                        </div>-->

<!-- examination end -->



















