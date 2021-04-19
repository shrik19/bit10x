<!DOCTYPE html>
<html lang="zxx">
<head>
   <?php $this->load->view('includes/public_header'); ?>
</head>
<body>
    <?php $this->load->view('includes/public_menu'); ?>

    <!--===== BANNER SECTION =====-->
    <section id="home-banner" class="banner-section2 apply-scroll-margin">
        <div class="container wow fadeInUp" data-wow-delay="0.2s">
            <div class="row">
                <div class="col-md-12 col-lg-6 banner-text banner-dark-text wow fadeInUp" data-wow-delay="0.4s" style="margin-top: 170px;">
                    <h1> Crypto simplified by Block Alpha </h1>
                    
                        <ul style="color:#fff;">
                            <li>
                            Our Block Alpha initiative removes the isolation factor from your crypto experience, by giving you access to seasoned crypto experts for discussions and assistance on all things Crypto.
                            </li>
                            <li>Our simple Block alpha dashboard allows you to action trades with automated Take Profit and Stop Loss capabilities, when paired with your exchange, safely, for non-custodial engagements.</li>
                            <li>Become a Block Alpha VIP member and receive 1-1, bespoke services on all things crypto, whether its, assistance with trading, analysis, development services, tech research or just to chat about crypto.</li>
                            <li>Our education module, The Crypto Guide, offers PDF and video content to help you learn about crypto.</li>
                            <li>High quality signals with a simple “tap tap trade” method.</li>
                            <li>Charting, and crypto news feed, from all the major publications delivered to you.</li>
                            <li>Try Block alpha now. <a style="padding: 6px;" class=" banner-dark-btn" href="/user/">Get Started</a></li>
                           
                            </ul>
                        
                    
                </div>
                <!--col-md-5-->
                <div class="col-md-12 col-lg-6 banner-img wow fadeInUp" data-wow-delay="0.4s">
                    <a   href="javascript:void(0);" data-toggle="modal" data-target="#bkdashboardModal" >
                <img style="width:95%;" src="<?php echo base_url();?>assets/images/bkdashboard.png" alt="header-img">
                </a></div>
                <!--col-md-7-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--============== END BANNER SECTION ===============-->

    <!--===== ABOUT SECTION =====-->
    <section class="about-section about-dark-section" style="padding-top:70px;">
        <div class="container wow fadeInUp" data-wow-delay="0.2s">
            <div class="box col-md-12" style="padding-bottom: 35px;">
            <div class="row">
               <!-- 
 <div class="col-md-12 col-sm-12 about-heading about-dark-heading">
                    <h2>How It Works</h2>
                    <p>Nothing na nating alam lana nakukuha ang<br> atensyon kng nagb abasa</p>
                </div>
 -->
                <!--col-md-12-->
                <style>
                .packagediv:hover{
                    opacity: .66;
                }
                </style>
                 <div class="col-md-12 col-sm-12 currency-heading currency-dark-heading" data-wow-delay="0.4s" style="margin-bottom: 25px;" >
                    <h2 style="margin-bottom: 20px;color:#4367b1"><img  src="<?php echo base_url();?>/assets/images/blockalphasmlogo.png"> Buy Coins</h2>
                   
                 </div>
				 <form class="row col-md-12" action="<?php if($this->session->userdata('is_logged_in')) echo  base_url().'user/buycoin'; else echo base_url().'user';?>" method="post">
					<div class="col-md-2">
					  &nbsp;
					</div>
				   
					<!--col-md-4-->
				   <select required class="form-control selectcoin col-md-2" name="coin">
					   <option value="">Select Coin</option>
					   <?php
					   if(!empty($coins)) {
						   foreach($coins as $coin) {
							   echo'<option value="'.$coin->id.'">'.$coin->coin.'</option>';
						   }
					   } ?>
				   
				   </select>
				   <div class="col-md-1">
					  &nbsp;
					</div>
				   <input name="coinamount" required type="tel" class="form-control col-md-2 coinamount digits" placeholder="Enter Amount" >
				   <div class="col-md-1">
					  &nbsp;
					</div>
				   <button type="submit" class="btn btn-primary buycoin col-md-2">Buy</button>
					
				</form>
                <!--col-md-4-->
            </div>
            <!--row-->
            </div>
        </div>
        <!--container-->
    </section>
    <!--============== END ABOUT SECTION ===============-->
    
    <!--===== ABOUT SECTION =====-->
    <!-- 
<section id="about" class="about-section3">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 about-dark-text2">
                    
                    <div class='news'>
                    	<h3><br>News</h3>
                    	<div class='news-container'>
                    		<p>&nbsp;</p>
                    		<div class='loader-100'></div>
						
						</div>
					</div>
                    
                </div>
                <div class="col-md-4 col-lg-4 about-dark-text2">
                	<p>&nbsp;</p>
                    <a class="banner-btn banner-dark-btn more-news" href="#">Read More</a>
                </div>
                <!~~col-md-4~~>
            </div>
            <!~~row~~>
        </div>
        <!~~container~~>
    </section>
 -->
    <!--============== END ABOUT SECTION ===============-->
    
    
   
    <!--===== ROAD MAP SECTION =====-->
    <section id="roadmap" class="roadmap-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-12 roadmap-heading">
                    <h2>Road Map</h2>
                </div>
                <!--col-md-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
        <div class="container roadmap-wrapper">
            <div class="row">
                <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2-->
                <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2-->
                 <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2-->
                <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2-->
                <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2-->
                <div class="col-md-2 col-lg-2 roadmap-text">
                 <div class="roadmap-icon2">
                 </div>
                </div>
                <!--col-md-2--> 
            </div>
            <!--row-->
        </div>
        <!--container-->
        <div class="container">
        <div class="row">
         <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Learn everything you need to know with our education and training model </p>
		   </div>
        </div>
        <!--col-lg-2-->
        <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Plug in your favorite exchanges</p>
		   </div>
        </div>
        <!--col-lg-2-->
        <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Use the tools provided to place trade like a pro</p>
		   </div>
        </div>
        <!--col-lg-2-->
        <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Trade signals from analysts with just two clicks</p>
		   </div>
        </div>
        <!--col-lg-2-->
        <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Enjoy your profits</p>
		   </div>
        </div>
        <!--col-lg-2-->
         <div class="col-lg-2">
			<div class="roadmap-content roadmap-content-white">
			<h5>&nbsp;</h5>
			<p>Smile and repeat</p>
		   </div>
        </div>
        <!--col-lg-2-->
        </div>
        <!--row-->
        </div>
        <!--container-->
    </section>
    <!--============== END ROAD MAP SECTION ===============-->
    
  
    <!--===== CURRENCY SECTION =====-->
    <section id="currency" class="currency-dark-section">
        <div class="container">
            <div class="row wow fadeIn" data-wow-delay="0.2s">
                <div class="col-md-12 col-sm-12 currency-heading currency-dark-heading">
                    <h2>Crypto Market</h2>
                </div>
                <!--col-md-12-->
                <div class="col-md-12 table-info table-dark-info iframe-trending light-bg">
                	<iframe src="https://widget.coinlib.io/widget?type=full_v2&theme=light&cnt=6&pref_coin_id=1505&graph=yes" width="100%" height="409px" scrolling="auto" marginwidth="0" marginheight="0" frameborder="0" border="0" style="border:0;margin:0;padding:0;"></iframe>
                </div>
                <!--col-lg-12-->
            </div>
            <!--row-->
        </div>
        <!--container-->
    </section>
    <!--============== END CURRENCY SECTION ===============-->

   
    <!--  Modal-->
    
    <div class="modal fade" id="bkdashboardModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document" >
			  <div class="modal-content">
				
				<div class="modal-body">
				        <img style="width:100%;" src="<?php echo base_url();?>assets/images/bkdashboard.png" alt="header-img">
                     </div>
				<div class="modal-footer">
				  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
            
		  <div class="modal fade" id="basicPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document" style="top:10%">
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">Standard (Monthly and Annual)</h5>
				  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				</div>
				<div class="modal-body">
				        <ul>
                           
                            <li>Access to signals telegram group
                                <ul>
                                    <li>Receive signal alerts</li>
                                    <li>Receive market updates on active trades.</li>
                                </ul>
                            </li>
                           
                        </ul>
                        <ul>
                           
                            <li>Access to Block Alpha dashboard
                                <ul>
                                    <li>Automated trade simplification paired to Binance exchange</li>
                                    <li>Real time Crypto news aggregator</li>
                                    <li>View open trades and trade history</li>
                                    <li>The Crypto Guide video tutorials and PDF’s on all things Crypto.</li>
                                    <li>Trading View charts on all USDT pairs available on Binance.</li>
                                    <li>Summarised view of live Crypto prices and charts including a live ticker.</li>
                                </ul>
                            </li>
                           
                        </ul>
                     </div>
				<div class="modal-footer">
				  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
            <div class="modal fade" id="vipPackageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document" >
			  <div class="modal-content">
				<div class="modal-header">
				  <h5 class="modal-title" id="exampleModalLabel">VIP</h5>
				  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				  </button>
				</div>
				<div class="modal-body">
				        <ul>
                           <li>Interactive access to VIP group on telegram</li>
                           <li>Charting requests done for you.</li>
                           <li>Early token projects assessments and discussions</li>
                           <li>Detailed assessments on all signals provided to you.</li>
                           <li>API to exchanges support for paring with the Block Alpha dashboard.</li>
                           
                            <li>Free access to all paid seminars done by our team.
                                <ul>
                                    <li>Engagement with our crypto experts on request.</li>
                                   
                                </ul>
                            </li>
                           
                       
                           
                            <li>ALL Basic features:
                                <ul>
                                    <li>Access to signals telegram group
                                        <ul>
                               
                                            <li>Receive signal alerts</li>
                                           <li>Receive market updates on active trades.</li>
                                        </ul>
                                    </li>
                                    <li>Access to Block Alpha dashboard
                                        <ul>
                               
                                            <li>Automated trade simplification paired to Binance exchange</li>
                                           <li>Real time Crypto news aggregator</li>
                                           <li>View open trades and trade history</li>
                                           <li>The Crypto Guide video tutorials and PDF’s on all things Crypto.</li>
                                           <li>Trading View charts on all USDT pairs available on Binance.</li>
                                           <li>Summarised view of live Crypto prices and charts including a live ticker.</li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                           
                        </ul>
                     </div>
				<div class="modal-footer">
				  <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
				</div>
			  </div>
			</div>
		  </div>
    
    <?php $this->load->view('includes/public_footer'); ?>
    
    
    <script type='text/javascript'>
	$(function () {
    $("input[name*='coinamount']").keydown(function (event) {


        if (event.shiftKey == true) {
            event.preventDefault();
        }

        if ((event.keyCode >= 48 && event.keyCode <= 57) || 
            (event.keyCode >= 96 && event.keyCode <= 105) || 
            event.keyCode == 8 || event.keyCode == 9 || event.keyCode == 37 ||
            event.keyCode == 39 || event.keyCode == 46 || event.keyCode == 190) {

        } else {
            event.preventDefault();
        }

        if($(this).val().indexOf('.') !== -1 && event.keyCode == 190)
            event.preventDefault(); 
        //if a decimal has been added, disable the "."-button

    });
});​
    	$(document).ready(function(){
    		
    		$.ajax({
					url: dataUrl,
					data: {"ajaxData":"1"},
					type: "post",
					success: function(data){
						var json	= JSON.parse(data);
						
						
						$(".btc").html("$ "+json['btc']['USD']);
						$(".eth").html("$ "+json['eth']['USD']);
						$(".ltc").html("$ "+json['ltc']['USD']);
						
						var newsArray	= Array();
						var newsBig		= Array();
						for(var i=0;i<10;i++)
						{							
							var eachNews						= json['news']['Data'][i];
							newsArray[i]		 				= "<li><img src='"+eachNews['imageurl']+"' class='news-img'>"+eachNews['title']+"</li>";							
						}
						
						$(".news-container").html("<ul id='news'>"+newsArray.join("")+"</ul>");
						$(".more-news").show(100);
						
						
						console.log(newsBig.join(""));
					}
			  });
			  
			  
    	});
    	
    	$(function(){
		  var tickerLength = $('.news-container ul li').length;
		  var tickerHeight = $('.news-container ul li').outerHeight();
		  $('.news-container ul li:last-child').prependTo('.news-container ul');
		  $('.news-container ul').css('marginTop',-tickerHeight);
		  function moveTop(){
			$('.news-container ul').animate({
			  top : -tickerHeight
			},800, function(){
			 $('.news-container ul li:first-child').appendTo('.news-container ul');
			  $('.news-container ul').css('top','');
			});
		   }
		  setInterval( function(){
			moveTop();
		  }, 3000);
		  });
    	
    </script>
</body>
</html>