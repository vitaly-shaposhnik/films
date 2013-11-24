var $collectionHolder;

var $addLink = $('<a href="#" class="add_link">Add</a>');
var $newLinkLi = $('<li></li>').append($addLink);

jQuery(document).ready(function() {
	// Get the ul that holds the collection
	$collectionHolder = $('#fields-list');

	// add a delete link to all of the existing form li elements
	$collectionHolder.find('li').each(function() {
		addFormDeleteLink($(this));
	});

	// add the "add" anchor and li to the ul
	$collectionHolder.append($newLinkLi);

	// count the current form inputs we have (e.g. 2), use that as the new
	// index when inserting a new item (e.g. 2)
	$collectionHolder.data('index', $collectionHolder.find(':input').length);

	$addLink.on('click', function(e) {
		// prevent the link from creating a "#" on the URL
		e.preventDefault();

		// add a new form (see next code block)
		addForm($collectionHolder, $newLinkLi);
	});
});


function addForm($collectionHolder, $newLinkLi) {
	// Get the data-prototype explained earlier
	var prototype = $collectionHolder.data('prototype');

	// get the new index
	var index = $collectionHolder.data('index');

	// Replace '__name__' in the prototype's HTML to
	// instead be a number based on how many items we have
	var newForm = prototype.replace(/__name__/g, index);

	// increase the index with one for the next item
	$collectionHolder.data('index', index + 1);

	// Display the form in the page in an li, before the "Add" link li
	var $newFormLi = $('<li></li>').append(newForm);
	$newLinkLi.before($newFormLi);

	// add a delete link to the new form
	addFormDeleteLink($newFormLi);
}


function addFormDeleteLink($formLi) {
	var $removeFormA = $('<a href="#">delete</a>');
	$formLi.append($removeFormA);

	$removeFormA.on('click', function(e) {
		// prevent the link from creating a "#" on the URL
		e.preventDefault();

		// remove the li for the form
		$formLi.remove();
	});
}