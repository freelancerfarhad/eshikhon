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
  
        <h2>About Us</h2>
            <p>Validate  Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent aliquam velit a magna sodales quis elementum ipsum auctor. Ut at metus leo, et dictum sem Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent aliquam velit a magna sodales quis elementum ipsum auctor. Ut at metus leo, et dictum sem Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Praesent aliquam velit a magna sodales quis elementum ipsum auctor. Ut at metus leo, et dictum sem</p>
            
            <div class="cleaner_h30"></div>
        
            <div class="service_box">
                <h4>Lorem ipsum dolor sit amet</h4>
                
                <div class="left">
                    <a href="#"><img src="{{asset('images/chart1.png')}}" alt="chart 1"></a>                </div>
            
                <div class="cleaner"></div>
                	<ol>
                        <li>Fusce fringilla, dui sed blandit luctus, arcu augue pellentesque</li>
                  		<li>Sed fermentum arcu in enim euismod quis lobortis </li>
                        <li>Class aptent taciti sociosqu ad litora torquent </li>

           	  </ol>
                <div class="cleaner"></div>
            </div>
            
        
    	</div> <!-- end of main -->
 	<div class="cleaner"></div>
  </div>
  @endsection