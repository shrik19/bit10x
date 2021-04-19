<!--===== FOOTER SECTION =====-->
	<script>
	<?php echo "var dataUrl = '".current_url()."';";?>
	</script>   
	
    <footer id="footer" class="footer-section footer-dark-section">
        <div class="container">
            <div class="row wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-3 footer-text">
                <!-- <h4>Secret</h4>
                <p>This response is important for our ability to learn from mistakes, but it alsogives rise to self-criticism</p> -->
                <p><img src="<?php echo base_url(); ?>/assets/images/footerbalogo.png" width="200"></p>
                <a href="#"><i class="fa fa-facebook"></i></a>
                <a class="second" href="#"><i class="fa fa-twitter"></i></a>
                <a class="third" href="#"><i class="fa fa-linkedin"></i></a>
                </div>
                <!--col-md-4-->
                <div class="col-md-3 footer-nav">
                <!--<h5>Quick Links</h5>
                <ul>
                <li><a href="#">How it Works</a></li>
                <li><a href="#">Guarantee</a></li>
                <li><a href="#">Exchange</a></li>
                <li><a href="#">Pricing</a></li>
                <?php
                foreach($policies as $d){
                 ?> <li><?php echo '<a target="_blank" id="'.$d->id.'"  href="'.base_url().'assets/policies/'.$d->policyfile.'">'.$d->title.'</a>'; ?></li>  <?php
                } ?>
                </ul> -->
                <p style="color:white;">DCS Block Alpha (Pty) Ltd
                    Reg: 2020/012248/07
                    66 Adelaide Tambo Drive, Durban North, KZN, RSA
                    </p>
                </div>
                <!--col-md-3-->
                <div class="col-md-3 footer-nav">
                <h5>About Us</h5>
                <ul>
                    <?php
                    foreach($policies as $d) {
                        echo '<li><a  target="_blank" href="'.base_url().'assets/policies/'.$d->policyfile.'">'.$d->title.'</a></li>';
                    }
                    ?>
               
                </ul>
                </div>
                <!--col-md-3-->
                <div class="col-md-2 footer-contact">
                <h5>Contact us</h5>
                <p>
                admin@blockalpha.net<br>
                      +27 87 153 5162
                </p>
                </div>
                <!--col-md-2-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </footer>
    <!--============== END FOOTER SECTION ===============-->

    <!--===== JAVASCRIPT FILES =====-->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/tether.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/owl-carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-validator.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/waypoints.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery.meanmenu.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/active-scroll-nav.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/wow.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/main.js"></script>
      <script src="<?php echo base_url(); ?>assets/js/notify.js"></script>
<?php $this->load->view('includes/common_to_all_footer'); ?>