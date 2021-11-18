<?php
    include_once("inc/header.php");
    include_once("inc/top.php");
?>

<style>
    .content {
    padding: 20px 0;
    background: #FFF;
}

.support {
    padding: 1.5%;
}

.support_desc {
    float: left;
    width: 75%;
}

.support_desc p {
    font-size: 14px;
    color: #777;
    line-height: 1.8em;
    padding: 5px 0;
}

.group {
    zoom: 1;
}

.section {
    clear: both;
    padding: 0px;
    margin: 0px;
}

.col:first-child {
    margin-left: 0;
}

.span_2_of_3 {
    width: 63.1%;
    padding: 1.5%;
}
.col {
    display: block;
    float: left;
    margin: 0% 0 1% 1.6%;
}

.contact-form {
    position: relative;
    padding-bottom: 30px;
}

.contact-form div {
    padding: 5px 0;
}

form{
    margin: 0;
    padding: 0;
    border: 0;
    font-size: 100%;
    font: inherit;
    vertical-align: baseline;
}

.contact-form input[type="text"], .contact-form textarea {
    padding: 8px;
    display: block;
    width: 98%;
    background: #fcfcfc;
    border: none;
    outline: none;
    color: #464646;
    font-size: 0.8125em;
    font-family: Arial, Helvetica, sans-serif;
    box-shadow: inset 0px 0px 3px #999;
    -webkit-box-shadow: inset 0px 0px 3px #999;
    -moz-box-shadow: inset 0px 0px 3px #999;
    -o-box-shadow: inset 0px 0px 3px #999;
    -webkit-appearance: none;
}

.span_1_of_3 {
    width: 29.2%;
    padding: 1.5%;
}

</style>

<div class="container">
     <div class="main">
    <div class="content">
    	<div class="support">
  			<div class="support_desc">
  				<h3>Live Support</h3>
  				<p><span>24 hours | 7 days a week | 365 days a year &nbsp;&nbsp; Live Technical Support</span></p>
  				<p> It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters.There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text.</p>
  			</div>
  			<div class="clear"></div>
  		</div>
    	<div class="section group">
				<div class="col span_2_of_3">
				  <div class="contact-form">
				  	<h2>Contact Us</h2>
					    <form>
					    	<div>
						    	<span><label>NAME</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>E-MAIL</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						     	<span><label>MOBILE.NO</label></span>
						    	<span><input type="text" value=""></span>
						    </div>
						    <div>
						    	<span><label>SUBJECT</label></span>
						    	<span><textarea> </textarea></span>
						    </div>
						   <div>
						   		<span><input type="submit" value="SUBMIT"></span>
						  </div>
					    </form>
				  </div>
  				</div>
				<div class="col span_1_of_3">
      			<div class="company_address">
				     	<h2>Company Information</h2>
						    	<p>500 Lorem Ipsum Dolor Sit,</p>
						   		<p>22-56-2-9 Sit Amet, Lorem,</p>
						   		<p>USA</p>
				   		<p>Phone:(00) 222 666 444</p>
				   		<p>Fax: (000) 000 00 00 0</p>
				 	 	<p>Email: <span>info@mycompany.com</span></p>
				   		<p>Follow on: <span>Facebook</span>, <span>Twitter</span></p>
				   </div>
				 </div>
			  </div>    	
    </div>
 </div>
</div>

<?php
    include_once("inc/footer.php");
?>