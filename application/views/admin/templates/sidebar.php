<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        
        <li class="<?php if(isset($page) && $page=="dashboard"){echo 'active'; }?>">
          <a href="<?php echo site_url(); ?>admin">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
        </li>
          
           <li class="treeview <?php if(isset($page) && ($page=="banners" || $page=="addbanner" || $page=="editbanner") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-image"></i>
            <span>Banners</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="banners"){echo 'active'; }?>"><a href="<?php echo site_url('admin/banners'); ?>"><i class="fa fa-circle-o"></i> All Banners</a></li>
            <li class="<?php if(isset($page) && $page=="addbanner"){echo 'active'; }?>"><a href="<?php echo site_url('admin/banners/add'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
            
          </ul>
        </li>
          
         <li class="treeview <?php if(isset($page) && ($page=="pages" || $page=="addpage" || $page=="editpage") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>Pages</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="pages"){echo 'active'; }?>"><a href="<?php echo site_url('admin/pages'); ?>"><i class="fa fa-circle-o"></i> All Pages</a></li>
            
          </ul>
        </li>
           <li class="treeview <?php if(isset($page) && ($page=="doctors" || $page=="doctordetail") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-user-md"></i>
            <span>Doctors</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="doctors"){echo 'active'; }?>"><a href="<?php echo site_url('admin/doctors'); ?>"><i class="fa fa-circle-o"></i> All Doctors</a></li>
           
          </ul>
        </li>
          <li class="treeview <?php if(isset($page) && ($page=="users" || $page=="userdetail") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Users</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="users"){echo 'active'; }?>"><a href="<?php echo site_url('admin/users'); ?>"><i class="fa fa-circle-o"></i> All Users</a></li>
           
          </ul>
        </li>
          <li class="treeview <?php if(isset($page) && ($page=="categories" || $page=="addcategory" || $page=="editcategory") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-cubes"></i>
            <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="categories"){echo 'active'; }?>"><a href="<?php echo site_url('admin/categories'); ?>"><i class="fa fa-circle-o"></i> All Categories</a></li>
              <li class="<?php if(isset($page) && $page=="addcategory"){echo 'active'; }?>"><a href="<?php echo site_url('admin/categories/add'); ?>"><i class="fa fa-circle-o"></i> Add New</a></li>
            
          </ul>
        </li>
        
          <li class="treeview <?php if(isset($page) && ($page=="settings" || $page=="addsetting" || $page=="editsetting") ){echo 'active'; }?>">
          <a href="#">
            <i class="fa fa-gears"></i>
            <span>Settings</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php if(isset($page) && $page=="settings"){echo 'active'; }?>"><a href="<?php echo site_url('admin/settings'); ?>"><i class="fa fa-circle-o"></i> Edit Site Settings</a></li>
            
          </ul>
        </li>
         
       
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
