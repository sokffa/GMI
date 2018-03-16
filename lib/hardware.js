// JavaScript Document


function addHardware()
{
	//alert('addHardware');
	window.location.href = 'view.php?v=addhardware';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}
function editHardware(id)
{

	window.location.href = 'hardware/index.php?view=edit&id=' + id;
	//alert(id);
	
}

function deleteHw(id)
{
	if (confirm('Delete this Hardware?')) {
		window.location.href = 'hardware/processHardware.php?action=delete&id=' + id;
	}
}

