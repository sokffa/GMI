// JavaScript Document

function addLab()
{
	window.location.href = 'view.php?v=addlab';
}

function deleteLab(id)
{
	if (confirm('Delete this Lab?')) {
		window.location.href = 'labs/processLab.php?action=delete&id=' + id;
	}
}

function editLab(id)
{
	window.location.href = 'labs/?view=edit&id=' + id;

}

