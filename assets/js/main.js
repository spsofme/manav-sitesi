// click to nav menu items
for (let i = 0; i < document.querySelectorAll('.navbar-nav .nav-item:not(.dropdown)').length; i++) {
	document.querySelectorAll('.navbar-nav .nav-item:not(.dropdown)')[i].addEventListener('click', () => {
		document.querySelectorAll('.navbar-nav .nav-item .active')[0].classList.remove('active');
		document.querySelectorAll('.navbar-nav .nav-item:not(.dropdown) .nav-link')[i].classList.add('active');
		document.querySelector('.navbar-collapse .navbar-brand').classList.remove('d-inline');
	});
}


// click to dropdown-items
for (let i = 0; i < document.querySelectorAll('.navbar-nav .nav-item.dropdown .dropdown-menu li .dropdown-item').length; i++) {
	document.querySelectorAll('.navbar-nav .nav-item.dropdown .dropdown-menu li .dropdown-item')[i].addEventListener('click', () => {
		document.querySelector('.navbar-nav .nav-item .active').classList.remove('active');
		document.querySelector('.navbar-nav .nav-item.dropdown .nav-link').classList.add('active');
		document.querySelector('.navbar-collapse .navbar-brand').classList.remove('d-inline');
	});
}

for (let i = 0; i < document.querySelectorAll('.navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item:not(.text-info, dropdown-divider)').length; i++) {
	let item = document.querySelectorAll('.navbar-nav .nav-item.dropdown .dropdown-menu .dropdown-item:not(.text-info, dropdown-divider)')[i];
	item.addEventListener('click', () => {
		document.querySelector('#products div nav .nav .nav-link.active').classList.remove('active');
		document.getElementById(`product-${item.innerHTML.toLowerCase()}`).classList.add('active');
		document.querySelector('#nav-tabContent .active').classList.remove('active', 'show');
		document.getElementById(`${item.innerHTML.toLowerCase()}`).classList.add('active', 'show');
	});
}


// click to nav-icon
document.getElementById('nav-icon').addEventListener('click', () => {
	document.querySelector('.navbar-collapse').classList.toggle('active');
	document.querySelector('.navbar-collapse .navbar-brand').classList.toggle('d-inline');
});


// event to windows scroll
window.onscroll = () => {
	if (window.scrollY > 1) {
		document.querySelector('.navbar').classList.add('nav-scroll');
		document.querySelector('.navbar').classList.add('p-0');
	} else {
		document.querySelector('.navbar').classList.remove('nav-scroll');
		document.querySelector('.navbar').classList.remove('p-0');
	}
	
	// menu activation
	for (let i = 0; i < document.querySelectorAll('main > .container-fluid > div').length; i++) {
		if (window.scrollY >= document.querySelectorAll('.main > .container-fluid > div')[i].offsetTop - document.querySelector('nav.navbar').offsetHeight - 50) {
			document.querySelector('.navbar-nav .nav-item .active').classList.remove('active');
			document.querySelectorAll('.navbar-nav .nav-item .nav-link')[i].classList.add('active');
			document.querySelector('.navbar-collapse .navbar-brand').classList.remove('d-inline');
		}
	}
	if (window.scrollY >= document.querySelector('#footer').offsetTop - document.querySelector('nav.navbar').offsetHeight - 50) {
		document.querySelector('.navbar-nav .nav-item .active').classList.remove('active');
		document.querySelector('.navbar-nav .nav-item .nav-link[href="#footer"]').classList.add('active');
		document.querySelector('.navbar-collapse .navbar-brand').classList.remove('d-inline');
	}
};