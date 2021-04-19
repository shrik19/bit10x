<!DOCTYPE html>
<html lang="en">

<head>

 	<?php $this->load->view('includes/admin_header'); ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

       <?php $this->load->view('includes/admin_top_menu'); ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">

         <?php $this->load->view('includes/admin_top_bar'); ?>

          <!-- Content Row -->

          <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-8 col-lg-8">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Save Content Page</h6>
                  <span class="pull-right"><a href="/admin/contentpage">Back</a></span>
                </div>
                <!-- Card Body -->
                <div class="card-body iframe-related" >
                    
                    <?php
                    $attributes = ['method' => 'post', 'id' => 'savecontentpage','enctype'=>'multipart/form-data'];
                echo form_open('/admin/contentpagesave/', $attributes);
                    ?>
                    <input type="hidden" id="id" class="form-control" value="<?php echo isset($contentpage->id) ? set_value("id", $contentpage->id) : '0'; ?>" name="id">
                    	<div class="form-group">
                    		<label>Title</label>
                    		<input type="hidden" id="title" name="old_title" class="form-control" value="<?php echo isset($contentpage->title) ? set_value("old_title", $contentpage->title) : ''; ?>">
                    		<input type="text" id="title" name="title" class="form-control" value="<?php echo isset($contentpage->title) ? set_value("title", $contentpage->title) : set_value("title"); ?>">
                    	    <?php echo form_error('title', '<div style="color:red;">', '</div>'); ?>
                    	</div>
                    	<div class="form-group">
                    		<label>Status</label>
                    		<select name="status" class="form-control">
                    		    <?php
                    		    $status=1;
                    		    if(isset($contentpage->status)) $status=$contentpage->status;
                    		    else $status=set_value("status");
                    		    ?>
                    		    <option value="1" <?php if($status==1) echo'selected="selected"';?>>Active</option>
                    		    <option value="2" <?php if($status!=1) echo'selected="selected"';?>>Block</option>
                    		    </select>
                    		    <?php echo form_error('status', '<div style="color:red;">', '</div>'); ?>
                    		</div>
                    <!--	<div class="form-group">
                    		<label>Content</label>
                    		<textarea class="form-control" id="tiny" name="content"><?php echo isset($contentpage->content) ? set_value("content", $contentpage->content) : set_value("content"); ?></textarea>
                    	    <?php echo form_error('content', '<div style="color:red;">', '</div>'); ?>
                    	</div>
                    	-->
                    	<div class="form-group">
                    		<label>Upload File (.pdf format)</label>
                    		<input type="file" class="form-control-file" id="policyfile" name="policyfile">
                    		<?php
                    		if(isset($contentpage->policyfile)){
                    		    echo'<a download href="'.base_url().'assets/policies/'.$contentpage->policyfile.'"><i class="fa fa-file-pdf" aria-hidden="true">Download</i></a>';
                    		}
                    		?>
                    		    <?php echo form_error('policyfile', '<div style="color:red;">', '</div>'); ?>
                    		</div>
                    	<button class="btn btn-primary" >Submit</button>
                    </form>
              </div>
            </div>
          </div>
		
		
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php $this->load->view('includes/admin_footer'); ?>

  </div>
  <!-- End of Page Wrapper -->

<style>
.col-xl-8 {
    
    left: 15% !important;
}
</style>
</body>
     <script src="<?php echo base_url(); ?>assets/js/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.tinymce.min.js" referrerpolicy="origin"></script>
  <script>
      $('textarea#tiny').tinymce({
        height: 500,
        menubar: false,
        plugins: [
          'advlist autolink lists link image charmap print preview anchor',
          'searchreplace visualblocks code fullscreen',
          'insertdatetime media table paste code help wordcount'
        ],
        toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
      });
    </script>


</html>
