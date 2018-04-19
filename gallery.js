function expand_coment(item)
{
	// console.log(item);
	var comments = item.previousElementSibling;
	comments.classList.toggle('c_deployed');
	// console.log(item.innerHTML);
	if (item.innerHTML == 'expand  <i class="fas fa-angle-down"></i>')
		item.innerHTML = 'retract  <i class="fas fa-angle-up"></i>';
	else
		item.innerHTML = 'expand  <i class="fas fa-angle-down"></i>';
}

function coment_input(item)
{
	// console.log(item);
	var input = item.nextElementSibling;
	// console.log(item.innerHTML);
	input.classList.toggle('i_deployed');
	if (item.innerHTML == 'add comment  <i class="fas fa-angle-down"></i>')
		item.innerHTML = 'add comment  <i class="fas fa-angle-up"></i>';
	else
		item.innerHTML = 'add comment  <i class="fas fa-angle-down"></i>';
}