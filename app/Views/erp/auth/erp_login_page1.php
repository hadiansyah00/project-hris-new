<?php
use App\Models\SystemModel;
$SystemModel = new SystemModel();
$xin_system = $SystemModel->where('setting_id', 1)->first();
$favicon = base_url().'/public/uploads/logo/favicon/'.$xin_system['favicon'];
$session = \Config\Services::session();
$request = \Config\Services::request();
$username = $session->get('sup_username');
?>
<!-- [ auth-signin ] start -->
<div class="auth-wrapper auth-v3">
  <div class="auth-content">
    <?php if($session->get('err_not_logged_in')){?>
    <div class="alert alert-danger alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <?= $session->get('err_not_logged_in');?>
    </div>
    <?php } ?>
    <?php if($request->getVar('v')){?>
    <div class="alert alert-success alert-dismissible fade show">
      <button type="button" class="close" data-dismiss="alert">×</button>
      <?= lang('Frontend.xin_your_account_is_verified');?>
    </div>
    <?php } ?>
    <div class="card">
      <div class="row align-items-stretch text-center">
        <div class="col-md-6 img-card-side"> <img src="<?= base_url('public/assets/images/auth/'.$xin_system['auth_background'].'.jpg');?>" alt="" class="img-fluid"> </div>
        <div class="col-md-6">
          <div class="card-body">
             <div class="text-center">
                 <img src="<?= base_url();?>/public/uploads/logo/<?= $xin_system['favicon'];?>" alt="" class="img-fluid my-2" height="25" width="100">
            
             </div>
            <div class="text-left">
               <!--    <h4 class="mb-3 f-w-600">-->
               <!--Login-->
               <!-- <span class="text-primary">-->
               <!-- <?= $xin_system['company_name'];?>-->
               <!-- </span></h4>-->
              <p class="text-muted">
                Selamat datang kembali HRIS SBH
              </p>
            </div>
            <?php $attributes = array('class' => 'form-timehrm', 'name' => 'erp-form', 'id' => 'erp-form', 'autocomplete' => 'off');?>
            <?php $hidden = array('user_id' => 0);?>
            <?= form_open('erp/auth/login', $attributes, $hidden);?>
            <div class="">
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i data-feather="user"></i></span> </div>
                <input type="text" class="form-control"  id="iusername" name="iusername" placeholder="Username Anda">
              </div>
              <div class="input-group mb-3">
                <div class="input-group-prepend"> <span class="input-group-text"><i data-feather="lock"></i></span> </div>
                <input type="password" class="form-control" id="ipassword" name="password" placeholder="Password Anda">
              </div>
              <div class="form-group text-left my-1">
                <div class="float-right"> <a href="<?= site_url('erp/forgot-password');?>" class="text-primary"><span>
                  Lupa Password
                  </span></a> </div>
                <div class="d-inline-block">
                    <strong class="text-success">&nbsp;</strong>
                    </div>
              </div>
            </div>
            <div class="text-right mt-2">
              <button type="submit" class="btn btn-primary mt-1"><i class="fas fa-user-lock"></i>
              Masuk
              </button>
            </div>
            <?= form_close(); ?>
            
          </div>
        </div>
      </div>
    </div>
  </div>
</div>