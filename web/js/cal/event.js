<script language="JavaScript" type="text/javascript">
<!--
function openEventWindow(num) {
	// populate the hidden form
	var data = document.popup_data[num];
	var form = document.forms.eventPopupForm;
	form.elements.date.value = data.date;
	form.elements.time.value = data.time;
	form.elements.uid.value = data.uid;
	form.elements.cpath.value = data.cpath;
	form.elements.event_data.value = data.event_data;
	
	// open a new window
	var w = window.open('', 'Popup', 'scrollbars=yes,width=460,height=275');
	form.target = 'Popup';
	form.submit();
}

function EventData(date, time, uid, cpath, event_data) {
	this.date = date;
	this.time = time;
	this.uid = uid;
	this.cpath = cpath;
	this.event_data = event_data;
}
//-->
</script>
<script language="JavaScript" type="text/javascript">
<!--

function openTodoInfo(num) {	
	// populate the hidden form
	var data = document.todo_popup_data[num];
	var form = document.forms.todoPopupForm;

	form.elements.todo_data.value = data.todo_data;

	// open a new window
	var w = window.open('', 'Popup', 'scrollbars=yes,width=460,height=275');
	form.target = 'Popup';
	form.submit();
}
function TodoData(todo_data,todo_text) {
	this.todo_data = todo_data;
	this.todo_text = todo_text;
}

document.popup_data = new Array();
document.todo_popup_data = new Array();
//-->
</script>
