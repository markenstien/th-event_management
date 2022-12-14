$( document ).ready(function() 
{
	if( $('.form-verify') )
	{
		$('.form-verify').click(function(evt) {

			let message = $(this).attr('data-message');

			if(message == null) 
				message = 'Are you sure you want to continue this proccess , irreversible process ';


			if(!confirm(message))
				evt.preventDefault();
		});
	}


	if( $('.copy-to-clip-board') )
	{

		$('.copy-to-clip-board').click( function() {
			let value = $(this).data('value');

			alert("Copied to Clipboard");
			copyStringToClipBoard(value);
		});
		
	}

	if( $('.flash-alert') )
	{
		setTimeout( function()
		{
			$('.flash-alert').hide();
		} , 4000);
	}

	function copyStringToClipBoard(text)
	{
		var $temp = $("<input>");

		$("body").append($temp);

		$temp.val(text).select();

		document.execCommand("copy");

		$temp.remove();
	}
	function copyToClipboard(element) 
	{
		var $temp = $("<input>");

		$("body").append($temp);

		$temp.val($(element).text()).select();
		document.execCommand("copy");
		$temp.remove();
	}
	
});


const colors = {
    primary        : "#6571ff",
    secondary      : "#7987a1",
    success        : "#05a34a",
    info           : "#66d1d1",
    warning        : "#fbbc06",
    danger         : "#ff3366",
    light          : "#e9ecef",
    dark           : "#060c17",
    muted          : "#7987a1",
    gridBorder     : "rgba(77, 138, 240, .15)",
    bodyColor      : "#fff",
    cardBg         : "#fff"
}

const fontFamily = "'Roboto', Helvetica, sans-serif";

