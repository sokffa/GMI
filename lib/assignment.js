// JavaScript Document
function checkDate()
{
	with (window.document.frmAddUser) {
	if(
	 if (!isEmpty(txtDr)  ) {
			var startDt = txtDp.value;
			var endDt = txtDr.value;
			if( (new Date(startDt).getTime() < new Date(endDt).getTime()))
			{
				
			}
		} else {
			submit();
		}
	}
}

function assignAsset()
{
	//alert('assign');
	window.location.href = '../view.php?v=assign';
}
 

 


