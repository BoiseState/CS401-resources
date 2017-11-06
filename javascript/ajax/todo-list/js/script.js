/* Disclaimer: I'm sure this could be cleaned up a bit, but it is to
 * demonstrate the general idea of using ajax with an api. */
$(document).ready(function() {
	var taskList = $('#task-list');

	// Load the tasks from the tasks api.
	loadTasks();

	// Setup our handlers for sortable events.
	taskList.sortable({
		update: function() {
			updateTasks();
		}
	});

	// Setup a listener for adding new tasks.
	$("#form").on('submit', function(event) {
		var position = taskList.find("li").length;
		var description = $(this).find('#description');
		var details = $(this).find('#details');
		var priority = $(this).find('#priority');
		var task = {
			"description" : description.val(),
			"details" : details.val(),
			"priority" : priority.val(),
			"position" : position
		};
		description.val('');
		details.val('');
		priority.val('high');

		saveTask(task);
		event.preventDefault();
	});

	function saveTask(task) {
		var item = appendTaskListItem(task);
		var request = $.ajax({
			method: "POST",
			url: "api/tasks.php",
			data: $.param(task)
		});

		request.done(function(data) {
			item.attr("id", "task_" + data.id);
		});

		request.fail(function(error) {
			console.log(error.responseJSON.message);
			item.text('Failed to add task');
			item.fadeOut(2000, function() { item.remove(); });
		});
	}

	function updateTasks(){
		var tasks = $("ul").sortable("serialize");
		console.log(tasks);

		var request = $.ajax({
			method: "POST",
			url: "api/tasks.php",
			data: tasks
		});

		request.done(function(data) {
			console.log('success: ' + data.updated_count);
		});

		request.fail(function(error) {
			console.log(error.responseJSON.message);
			$("ul").sortable("cancel");
		});
	}

	function loadTasks() {
		var request = $.ajax({
			method: "GET",
			url: "api/tasks.php"
		});

		request.done(function(data) {
			if(data.length == 0) {
					taskList.after($('<span>You have no tasks.</span>'));
			} else {
				$.each(data, function(index, element) {
					appendTaskListItem(element);
				});
			}
		});

		request.fail(function(error) {
			alert('fail!');
			console.log(error.responseJSON.message);
		});
	}

	function appendTaskListItem(json) {
		console.log(json);
		var task = $('<li><div class="description"></div><div class="details"></div></li>');
		task.find('.description').text(json.description);
		task.find('.details').text(json.details);
		task.addClass(json.priority);
		task.attr('id', "task_" + json.id);
		taskList.append(task);
		return task;
	}
});
