<?php
function banner_form_fnc( $atts = array(), $content = '' ) {
	global $project_array;
	$html = '';
	$atts = shortcode_atts( array(
		'title' => '',
	), $atts, 'banner-form' );
	$html = '<form id="banner-form" action="'.home_url( '/search-property/' ).'">';
	if ($atts['title']) {
		$html .= '<h2 class="banner-title">'.$atts['title'].'</h2>';
	}
	$html .='
<div class="first-row">
	<div class="row">
		<div class="col-md-3">
			<div class="form-group"> 
				<select name="for" class="form-control">';
				foreach ($project_array['for'] as $key => $value) {				 	
					$html .='<option value="'.$key.'">'.$value.'</option>';
				} 
		$html .='</select>			
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group"> 			
				<input name="location" type="text" class="form-control" id="field-buy" placeholder="Search by region, suburb, postcode or property id"> 
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">  
				<input type="submit" class="btn btn-block btn-banner-submit" value="Submit">
			</div>
		</div>
	</div>
</div>
<div class="second-row">
	<div class="row">
		<div class="col-md-2">
			<div class="form-group"> 
				<select name="property_type" class="form-control"> 
					<option value="">Any property type</option>';

				foreach ($project_array['property_type'] as $key => $value) {				 	
					$html .='<option value="'.$key.'">'.$value.'</option>';
				} 		

	$html .='</select>			
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group"> 			
				<select name="bed" class="form-control"> 
					<option value="">Any Bed</option>  
					<option>1</option>  
					<option>2</option>  
					<option>3</option>  
					<option>4</option>  
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group"> 
				<select name="bath" class="form-control"> 
					<option value="">Any Bath</option>  
					<option>1</option>  
					<option>2</option>  
					<option>3</option>  
					<option>4</option> 
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group"> 
				<select name="parking" class="form-control"> 
					<option value="">Any Parking</option> 
					<option>1</option>  
					<option>2</option>  
					<option>3</option>  
					<option>4</option> 
				</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group"> 
				<select name="min_price" class="form-control"> 
					<option value="">Min Price</option>';

				foreach ($project_array['price'] as $key => $value) {				 	
					$html .='<option value="'.$key.'">'.$value.'</option>';
				} 		

	$html .='</select>
			</div>
		</div>
		<div class="col-md-2">
			<div class="form-group"> 
				<select name="max_price" class="form-control"> 
					<option value="">Max Price</option>';

				foreach ($project_array['price'] as $key => $value) {				 	
					$html .='<option value="'.$key.'">'.$value.'</option>';
				} 		

	$html .='</select>
			</div>
		</div>
	</div>
</div>
<div class="third-row">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">			
			<button type="button" class="btn btn-block btn-green btn-icon"><span>More Search Options</span><i class="fa fa-angle-down"></i> </button>
			<button type="button" class="btn btn-block btn-green btn-icon" style="display: none"><span>Less Search Options</span><i class="fa fa-angle-up"></i> </button>
		</div>
	</div>
</div>
</form>
';
	return $html;
}
add_shortcode( 'banner-form', 'banner_form_fnc' );
?>

