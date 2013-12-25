var
	$collectionHolder,
	$addLink = $('<a href="#" class="add_link">Add</a>'),
	$newLinkLi = $('<li></li>').append($addLink);
//end of vars

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

	// если добавленых актеров нету, то добавляем пустое поле
	if ( $collectionHolder.length && 0 == $collectionHolder.find(':input').length ) {
		addForm($collectionHolder, $newLinkLi);
	}

	$addLink.on('click', function(e) {
		// prevent the link from creating a "#" on the URL
		e.preventDefault();
		addForm($collectionHolder, $newLinkLi);
	});
});


/**
 * Add a new form
 * @param $collectionHolder
 * @param $newLinkLi
 */
function addForm($collectionHolder, $newLinkLi) {
	var
		/**
		 * Get the data-prototype explained earlier
		 */
		prototype = $collectionHolder.data('prototype'),

		/**
		 * get the new index
		 */
		index = $collectionHolder.data('index'),

		/**
		 * Replace '__name__' in the prototype's HTML to
		 * instead be a number based on how many items we have
		 */
		newForm = prototype.replace(/__name__/g, index),
		$newFormLi;
	//end of vars

	// increase the index with one for the next item
	$collectionHolder.data('index', index + 1);

	// Display the form in the page in an li, before the "Add" link li
	$newFormLi = $('<li></li>').append(newForm);
	$newLinkLi.before($newFormLi);

	// add a delete link to the new form
	addFormDeleteLink($newFormLi);
}


/**
 * add a delete link
 * @param $formLi
 */
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