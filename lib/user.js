// JavaScript Document
function checkAddUserForm()
{
	with (document.forms["frmAddUser"]) {

		if (isEmpty(txtEmail, 'Enter Email')) {
			return;
		} else if (isEmpty(txtFname, 'Enter First name')) {
			return;
		} else if (isEmpty(txtLname, 'Enter Last name')) {
			return;
		}else {
			submit();
		}
	}
}

function addUser()
{
	window.location.href = 'view.php?v=adduser';
}

function editUser(id)
{
	window.location.href = 'user/index.php?view=edit&id=' + id;
	//alert(id);
}

function deleteUser(userId)
{
	if (confirm('Voulez vous vraiment supprimer cette personne?')) {
		window.location.href = 'user/processUser.php?action=delete&userId=' + userId;
	}
}

