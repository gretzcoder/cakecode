$(document).ready(function () {
	$("a").on('click', function (event) {

		if (this.hash !== "") {

			event.preventDefault();

			var hash = this.hash;

			$('html, body').animate({
				scrollTop: $(hash).offset().top
			}, 800, function () {

				window.location.hash = hash;
			});
		}
	});

	$(this).scrollTop(0);
});

$("#chart-alert").hide();

function chartSuccess() {
	$("#chart-alert").fadeTo(2000, 500).slideUp(500, function () {
		$("#chart-alert").slideUp(500);
	});
}


$("nav .nav-link").on("click", function () {
	$("nav").find(".active").removeClass("active");
	$(this).addClass("active");
});

$('#photo').on('change', function () {
	//get the file name
	var fileName = $(this).val();
	//replace the "Choose a file" label
	$(this).next('.custom-file-label').html(fileName);
})

$('#hidden').mouseover(function () {
	$('#hidden').removeClass("hiddenup");
	$('#hidden').addClass("hidden");
})
$('#hidden').mouseleave(function () {
	$('#hidden').removeClass("hidden");
	$('#hidden').addClass("hiddenup");

})
$('#hidden').click(function () {
	$('#hidden').removeClass("hidden");
	$('#hidden').removeClass("hiddenup");
	$('#hidden').addClass("hiddenclick");

})
