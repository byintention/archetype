<?php
	// Custom search form
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div>
    	<label class="screen-reader-text" for="s">Search for:</label>
        <div id="search">
        	<input type="text" value="" name="s" id="s"  placeholder="Search"/>
        </div>
        <input type="submit" id="searchsubmit" value="GO" class="btn btn-primary"/>
    </div>
</form>