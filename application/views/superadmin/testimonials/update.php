<?php
defined('BASEPATH') or die('Error occured while page loading');
/*
 * Page Name            : update.php
 * Page Type             : View
 * Page Purpose         :  update Testimonial
 * Controller Name     :  superadmin/Cms/testimonials/details
 * Alias                      : projectname_/superadmin/Cms/testimonials/details/(title)/(id)
 * Designed By           : 
 * Designed On           : --
 * Design Completed On  : --
 * Created By            : Achari
 * Created On            : 12-5-2016
 * Modified By          : 
 * Modified On          : 
 * Extra notes            :
 * Folder Path           : views/superadmin/testimonials/update.php
 */
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Project Related Code Start -->
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title><?php echo SUPERADMIN_TITLE; ?><?php echo $URL_TITLE; ?></title>
        <meta name="description" content="<?php echo META_TAGS; ?>"/>
        <meta name="keywords" content="<?php echo META_KEYWORDS; ?>"/>
        <link rel="shortcut icon" type="image/x-icon" href="<?php echo FAVICON_PATH; ?>">
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <!-- Project Related Code End -->
        <link href="<?php echo ADMIN_CSS_PATH; ?>bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <!-- Custom CSS -->
        <link rel="stylesheet" type="text/css" href="<?php echo ADMIN_CSS_PATH; ?>jquery.datetimepicker.css"/>
        <link href="<?php echo ADMIN_CSS_PATH; ?>custom.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_CSS_PATH; ?>responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo ADMIN_CSS_PATH; ?>font-awesome.min.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <?php $this->load->view(ADMIN_INCLUDES_PATH . 'header'); /* Loading the Login Header */ ?>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="container-fluid">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 no-pad">
                    <div class="bread col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <ul>
                            <li><a href="<?php echo SITE_ADMIN_LINK; ?>" class="active"><i class="fa fa-home" aria-hidden="true"></i></a></li>
                            <li><a href="<?php echo SITE_ADMIN_LINK; ?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <?php
                            $breadcrumb_details = json_decode($breadcrumb);
                            $breadcrumb_count = count($breadcrumb_details);
                            foreach ($breadcrumb_details as $breadcrumb) {
                                ?>
                                <li><a href="<?php echo $breadcrumb->link; ?>" class="<?php echo $breadcrumb->class; ?>"><?php echo fetch_ucwords($breadcrumb->title); ?></a></li>
                                <li><a href="javascript:void(0);"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                            <?php } ?>
                        </ul>
                        <div class="clearfix"></div>
                    </div>

                </div>
                <div class="clearfix"></div>
                <div class="details col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!--Search Block Code Start-->
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 details-date" style="display:none;">
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-left">
                            <select name="city" id="city" class="minimal chanagecity col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <option value="1" data-city="1">&nbsp;Nellore</option>
                                <option value="19" data-city="19">&nbsp;Tirupathi</option>
                            </select>
                        </div>
                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-left">
                            <select name="city" id="city" class="minimal chanagecity col-lg-8 col-md-8 col-sm-8 col-xs-12">
                                <option value="1" data-city="1">&nbsp;Nellore</option>
                                <option value="19" data-city="19">&nbsp;Tirupathi</option>
                            </select>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-left search">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
                                <span class="input-group-addon" id="basic-addon2"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 pull-left search" style="display: none;">
                            <div id="datepicker" class="input-group date" data-date-format="mm-dd-yyyy">
                                <input class="form-control" type="text" readonly />
                                <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                            </div>
                        </div>
                        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 pull-left search">
                            <button class="btn btn-success btn-md">Search</button>
                        </div>

                    </div>
                    <!--Search Block Code End-->
                    <div class="clearfix"></div>
                    <!--Display messges Block Code Start-->
                    <div class="display_message_class"></div>
                    <!--Display messges Block Code End-->
                    <div class="info col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="reg col-lg-8 col-md-8 col-sm-8 col-xs-12 col-lg-push-2 col-md-push-2 col-sm-push-3 col-xs-push-0">
                            <h4 class="text-left"><b><?php echo $this->uri->segment(5); ?></b> Details</h4>
                            <?php
                            $req=  json_decode($testimonial_details);
                            if($req->code==SUCCESS_CODE)
                            {
                                $details=$req->testimonial_result;
                            ?>
                            <form role="form" name="testimonial_insert_form" id="testimonial_insert_form" method="post">
                                <input type="hidden" name="testmonial_id" id="testimonial_id" value="<?php echo $details->id; ?>"/>
                                <input type="hidden" name="old_profile_pic" id="old_profile_pic" value="<?php echo $details->picture; ?>"/>
                               <div class="row">
                                       <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Title<sup>*</sup><span id='test_title_error'></span></label>
                                                <input type="text" name="test_title" id="test_title" class="form-control input-md floatlabel" placeholder="Enter Title" title="Enter Title" maxlength="60"autocomplete="off" value="<?php echo $details->title; ?>"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Username<sup>*</sup><span id="username_error"></span></label>
                                            <input type="text" name="username" id="username" class="form-control input-md floatlabel" placeholder="Enter User name" title="Enter User name" value="<?php echo $details->username; ?>"/>
                                        </div>
                                        </div>
                                </div>
                               <div class="row">
                                       <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Profile Picture<sup></sup><span id='profilepicture_error'></span></label>
                                                <input type="file" name="profilepicture" id="profilepicture" class="form-control input-md floatlabel" title="Upload picture" accept="image/*"/>
                                            </div>
                                        </div>
                                        <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <label>Date & Time<sup>*</sup><span id="commentdate_error"></span></label>
                                            <input type="text" name="commentdate" id="commentdate" class="form-control input-md floatlabel" placeholder="Select Date" title="Select Date" value="<?php echo date('d-m-Y H:i:s',strtotime($details->created_date)); ?>"/>
                                        </div>
                                        </div>
                                </div>
                                <div class="row">
                                       <div class="col-xs-6 col-sm-6 col-md-6">
                                            <div class="form-group">
                                                <label>Comment<sup>*</sup><span id='comment_error'></span></label>
                                                <textarea name="comment" rows="7" id="comment" class="form-control input-md floatlabel" title="Enter Your Comment"><?php echo $details->comment; ?></textarea>
                                            </div>
                                        </div>
                                    <div class="col-xs-6 col-sm-6 col-md-6">
                                        <img src="<?php echo $details->picture; ?>" height="100" width="100"/>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 col-sm-6 col-md-6"></div>
                                   <div class="col-xs-6 col-sm-6 col-md-6">
                                        <div class="form-group">
                                            <button type="reset" class="btn btn-default  btn-md pull-right">Reset</button>
                                            <button type="submit" class="btn btn-danger btn-md pull-right">Update</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <?php } else {  ?>
                            <div class="row">
                                <div class="display_message_class alert alert-danger fade in"><?php echo fetch_ucwords($req->description); ?></div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="clearfix"></div>
            </div>  
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <?php $this->load->view(ADMIN_INCLUDES_PATH . 'footer'); /* Loading the Footer */ ?>
        <div class="clearfix"></div>

    </body>

</html>
<script type="text/javascript" src="<?php echo ADMIN_JS_PATH; ?>jquery.datetimepicker.full.js"></script>
<script>
$.datetimepicker.setLocale('en');
var currentTime = new Date();
var extendDate = new Date(currentTime.getFullYear(),currentTime.getMonth() +1,currentTime.getDate());
$('#commentdate').datetimepicker({value:'',minDate: new Date(),maxDate:extendDate,format:"d-m-Y H:i:s",minTime:'10',pickTime:true, timepicker: true,}).css({'color':'#000'});
</script>

 
<script type="text/javascript">
    $('#testimonial_insert_form').on('submit', function (p) {
        p.preventDefault();
        str=true;
        var test_title=$('#test_title').val();
        var username=$('#username').val();
        var commentdate=$('#commentdate').val();
        var comment=$('#comment').val();
        var test_title_err=V1_funNameCheck(test_title);
        if(test_title_err!=''){$('#test_title_error').html('Enter title');} else{$('#test_title_error').html('');}
        var username_err=V1_funNameCheck(username);
        if(username_err!=''){$('#username_error').html('Enter user name');} else{$('#username_error').html('');}
         var commentdate_err=V1_funEmptyCheck(commentdate);
        if(commentdate_err!=''){$('#commentdate_error').html('Select date and time');} else{$('#commentdate_error').html('');}
         var comment_err=V1_funEmptyCheck(comment);
        if(comment_err!=''){$('#comment_error').html('Enter comment');} else{$('#comment_error').html('');}
        if(test_title_err!='' || username_err!='' || commentdate_err!='' || comment_err!=''){
        str=false;
       }
       if(str==true)
       {
          $.ajax({
            type:"POST",
            dataType:"JSON",
            data : new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            url:"<?php echo SITE_ADMIN_LINK; ?>Cms/updateTestimonials",
            success:function(data){
                   console.log(data);
                   switch(data.code)
                {
                    case 200:
                     $('.display_message_class').html(data.description).addClass('alert alert-success fade in');
                        setTimeout(function(){window.location='<?php echo $link_url; ?>'; },3000);
                     break;
                    case 204:
                    case 301:
                    case 422:
                    case 575:
                        $('.display_message_class').html(data.description).addClass('alert alert-danger fade in');
                   break;
                }
                },
                   error:function(e){console.log(e);}
            });  
       }
       return str;

    });
</script>