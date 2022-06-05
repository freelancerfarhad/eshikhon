@extends('layout.app')
@section('style')
<style>
   #templatemo_right_column {
	/* float: right; */
	width: 850px;
	/* margin-right: 10px; */
}
#templatemo_main {
	/* float: right; */
	width: 795px;
	padding-top: 47px;
	margin-left: 30px; 
}

</style>
@endsection
@section('content')

<div id="templatemo_right_column">
    
        <div id="templatemo_main">
        
        	<h1>Contact Us</h1>

        <p><em>Aliquam pretium porta odio. Fusce quis diam sit amet tortor luctus pellentesque. Donec accumsan urna non elit tristique mattis. Vivamus fermentum orci viverra nisl. In nec magna id ipsum  aliquam dictum.</em></p>
        <p>Validate.  Donec euismod enim et risus. Nunc dictum, massa non dignissim commodo, metus quam vehicula lorem, et dignissim enim augue vitae pede. Donec at arcu. Nunc aliquam, dolor vitae sollicitudin lacinia, nibh orci sagittis diam, dignissim sodales dui erat nec eros..</p>
        <p>Aenean eleifend, neque hendrerit elementum sodales, sed tempor orci magna vitae tellus. Proin dui mauris, tempor eget, pulvinar sed, pretium sit amet, dui. Proin vulputate justo et quam. Cras nisl eros, elementum eu, iaculis vitae, viverra ut, ligula. Pellentesque metus. Duis dolor.</p>
        <div class="cleaner_h50"></div>

            <div id="contact_form">
            
                <h2>Contact Form</h2>
                
                <form method="post" name="contact" action="#">
                
                    <input type="hidden" name="post" value="Send">
                    <label for="author">Name:</label> <input type="text" id="author" name="author" class="required input_field">
                    <div class="cleaner_h10"></div>
                    
                    <label for="email">Email Address:</label> <input type="text" id="email" name="email" class="validate-email required input_field">
                    <div class="cleaner_h10"></div>
                    
                  
                    <label for="text">Message:</label> <textarea id="text" name="text" rows="0" cols="0" class="required"></textarea>
                    <div class="cleaner_h10"></div>
                    
                    <input type="submit" class="submit_btn" name="submit" id="submit" value="Send">
                    <input type="reset" class="submit_btn" name="reset" id="reset" value="Reset">
                
              </form>
            
            </div> 
        
        </div> <!-- end of main -->
        <div class="cleaner"></div>
    </div>
    @endsection