$(document).ready(function(){

	$('#contact3-form').submit(function(e){

		e.preventDefault();
		$(this)[0].children[3].children[0].disabled = true;

		console.log($(this)[0]);

		if( !$(this)[0].name.value || $(this)[0].name.value == '' )
		{
			window.location = '/';	
		}
		else if( !$(this)[0].email.value || $(this)[0].email.value == '' )
		{
			window.location = '/';
		}
		else
		{
			save($(this));
			
		}
		$(this)[0].reset()
		$(this)[0].children[3].children[0].disabled = false;

	});//END submit



	function save( data )
	{
		
		$.ajax(
		{

			type: 'POST',
			url: '/emails/create',
			data: data.serialize()

		}).done( function()
		{

			let link = document.createElement('a');
			link.href = '/ebooks/ebook_1.pdf';
			link.download = 'ebook_1.pdf';
			link.click();

		}).fail( function()
		{

				console.log("ERRO ......");

		});//end ajax

	}//END save


	

	$('#download-csv').on('click', function(e)
	{

		e.preventDefault();
		generateCsv($(this));

	});//END on




	function generateCsv(data)
	{

		$.ajax(
		{

			type: 'GET',
			url: '/emails/csv',
			data: data.serialize()

		}).done( function()
		{

			console.log("Success....");

		}).fail( function()
		{

			console.log("ERRO ......");

		});//end ajax

	}//END generateCsv





	


	$(".nav-tabs a").click( function( e )
	{
		e.preventDefault();
		$(this).tab('show');

	});//END click

	$('.nav-tabs a').on('shown.bs.tab', function( event )
	{
		var x = $(event.target).text();         // active tab
		var y = $(event.relatedTarget).text();  // previous tab
		$(".act span").text(x);
		$(".prev span").text(y);

	});//END on






	$('#block1').on('click', function(e)
	{
		e.preventDefault();
		
		$('#tab-languages').load('./inc/php.html');	

	});//END on







	$('#block2').on('click', function(e)
	{

		e.preventDefault();
		
		$('#tab-languages').load('./inc/js.html');	

	});//END on







	$('#round-block1').on('mouseover', function(e)
	{
		console.log('ok');
		

	});//END on






	
});//END ready