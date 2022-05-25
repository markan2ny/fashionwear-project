
// Initiate the loader function
function loader(action){
	if (action == 'show') {
		$('body').append($('<div id="loader" style="">' +
			'<div style="width:100%; height:100%; background-color:black; opacity:0.2; position:fixed; left:0; top:0; z-index:999;"></div>' +
			'<div style=" z-index:9999; float:right; width:25%; right:0; bottom:0; position:fixed;">' +
				'<div class="progress" style="width:100%;">' +
					'<div class="progress-bar progress-bar-striped bg-warning progress-bar-animated" style="width:100%;" aria-valuemax="100" aria-valuemin="0" aria-valuenow="100" id="progress"></div>' +
				'</div>' +
			'</div>' +
		'</div>'));
	}else{
		$('#loader').remove();
	};
	
}
