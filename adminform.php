<div class="wrap">
    <div class="itema">
        <img src="<?php echo plugins_url('addsearch/images/logo.png'); ?>" />
        <div id="message" class="updated below-h2"><p><?php if ($_POST) echo 'Updated successfully! Now you can check your widget page'; ?></p></div>
        <p><?php _e('AddSearch is an instant search for your WordPress website. It’s lightning fast: you get results at the first key press, and they open up in a layer on top of the page. There are no longer results pages to sift through. AddSearch also supports all mobile devices, whether your site is responsive or not. Finally you get full control over the search results, and can control which pages & areas are more important than others.'); ?></p>

        <p><?php _e('Best of all, installing AddSearch is really easy, and takes just minutes. Follow these instructions:'); ?>
			<ol>
				<li><?php _e('Sign up on the homepage at <a href="http://www.addsearch.com/" target="_blank">www.addsearch.com</a>.');?></li>
				<li><?php _e('Wait for the confirmation email that tells you your search is available.');?></li>
				<li><?php _e('Click the link to your search demo in the email. Click on <strong>Install Now</strong>, and sign up into the AddSearch Dashboard.');?></li>
				<li><?php _e('Click <strong>Installation</strong>, scroll to the bottom of the page, and copy the Site Key.');?></li>
				<li><?php _e('Come back to this page WordPress. Paste your Site Key below and click <strong>Save</strong>');?></li>
				<li><?php _e('Go to <strong>Appearance -> Widgets.</strong> Drag the "AddSearch Instant Search" widget to your preferred widget area.');?></li>
				<li><?php _e('You\'re done - congrats! :)');?></li>
			</ol>
		</p>
    </div>
    <div class="itemb">
        <form action="" method="post" >
            <label for="custommercode"/><?php _e('Your Site Key:	'); ?></label>
            <input type="text" id="custommercode" name="custommercode" maxlength="32" value="<?php echo get_option('addSearchCustomerKey'); ?>">
            <input type="submit" class="button action" name="ccsave" id="ccsave" value="<?php _e('Save'); ?>"/>
        </form>
    </div>
    <div class="itemc">
        <p><?php _e('You can modify your search settings by logging in at <a href="http://www.addsearch.com/" target="_blank">www.addsearch.com</a>'); ?></p>
        <p><?php _e('AddSearch is free for smaller sites, up to 500 pages. After that there’s a reasonable monthly or annual fee. For pricing information see <a href="http://www.addsearch.com/pricing" target="_blank">www.addsearch.com/pricing</a>'); ?></p>
        <p><?php _e('Please note that AddSearch displays a small logo in the search results box, with a link to addsearch.com. If you encounter any problems, or if you have any feedback, feel free to contact us at support@addsearch.com'); ?></p>
		<p><?php _e('Thanks for using AddSearch!')?></p>

    </div>
</div>
<style type="text/css">
    .wrap{
        margin-top: 30px;
    }
    .itema, .itemc{
        line-height: 20px;
    }
    .itemb{
        margin: 70px 0;
        height: 10px
    }
    .itemb label{
        font-size: 24px;
        color: #000;
    }
    .itemb input#custommercode{
        width: 300px;
        height: 30px;
    }
    #message{
        <?php
            if ($_POST) echo 'display: block;';
            else echo 'display: none;';
        ?>  
    }
</style>