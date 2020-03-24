$(document).ready(function(){

	

	


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
		let active = 'active';
		
		$.ajax({

			url:'./inc/php.html'
	
		}).done(function(phpValue){
			
			//console.log(phpValue);
			//phpHtml = $.parseHTML(phpValue);
			let phpPrettify = PR.prettyPrintOne(phpValue);
			//console.log(phpPrettify);	

			

			$('#tab-languages').innerHtml = '';
			$('#tab-languages').html(phpPrettify);

			let a = document.querySelector('#tab-list');
			//let b = document.querySelector('#tab-languages');

			//console.log(a);
			//console.log(a.children[0].className);
			//console.log(a.children[0].className != 'active');
			//console.log(a.children[0].className.match('active'));
			//console.log(a.children[0].className.match('ative'));
			
			/*
			
			if( a.children[0].className != 'active' )
			{

				a.children[0].className = 'active';

			}//end else

			a.children[0].innerHTML = '';
			a.children[0].innerHTML = 'PHP 1';
			
			if( a.children[1].className == 'active' )
			{


				a.children[1].className = '';

			}//end else

			a.children[1].innerHTML = '';
			a.children[1].innerHTML = 'PHP 2';

			if( a.children[2].className == 'active' )
			{


				a.children[2].className = '';

			}//end else

			a.children[2].innerHTML = '';
			a.children[2].innerHTML = 'PHP 3';

			if( a.children[3].className == 'active' )
			{

				a.children[3].className = '';

			}//end else

			a.children[3].innerHTML = '';
			a.children[3].innerHTML = 'PHP 4';
			
			*/
			
			if( a.children[0].className.match(active) == null )
			{

				a.children[0].classList.add("active");

			}//end if
			

			a.children[0].innerHTML = '';
			a.children[0].innerHTML = 'PHP 1';





			
			if( a.children[1].className.match(active) )
			{


				a.children[1].classList.remove("active");

			}//end else

			a.children[1].innerHTML = '';
			a.children[1].innerHTML = 'PHP 2';







			if( a.children[2].className.match(active) )
			{


				a.children[2].classList.remove("active");

			}//end else

			a.children[2].innerHTML = '';
			a.children[2].innerHTML = 'PHP 3';





			if( a.children[3].className.match(active) )
			{

				a.children[3].classList.remove("active");

			}//end else

			a.children[3].innerHTML = '';
			a.children[3].innerHTML = 'PHP 4';
	
		}).fail(function(){
	
			console.log("Erro....");
	
		});//end ajax

	});//END on






	






	$('#block2').on('click', function(e)
	{
		e.preventDefault();
		let active = 'active';
		
		
		$.ajax({

			url:'./inc/js.html'
	
		}).done(function(jsValue){

			//console.log(jsValue);
			
			//jsHtml = $.parseHTML(jsValue);
			let phpPrettify = PR.prettyPrintOne(jsValue);
			$('#tab-languages').innerHtml = '';
			$('#tab-languages').html(phpPrettify);




			
			
			let a = document.querySelector('#tab-list');
			
			/*
			if( a.children[0].className != 'active' )
			{

				a.children[0].className = 'active';

			}//end else

			a.children[0].innerHTML = '';
			a.children[0].innerHTML = 'JS 1';
			
			if( a.children[1].className == 'active' )
			{


				a.children[1].className = '';

			}//end else

			a.children[1].innerHTML = '';
			a.children[1].innerHTML = 'JS 2';

			if( a.children[2].className == 'active' )
			{


				a.children[2].className = '';

			}//end else

			a.children[2].innerHTML = '';
			a.children[2].innerHTML = 'JS ';

			if( a.children[3].className == 'active' )
			{

				a.children[3].className = '';

			}//end else

			a.children[3].innerHTML = '';
			a.children[3].innerHTML = 'JS 4';
			*/


			if( a.children[0].className.match(active) == null )
			{

				a.children[0].classList.add("active");

			}//end else

			a.children[0].innerHTML = '';
			a.children[0].innerHTML = 'JS 1';
			




			if( a.children[1].className.match(active) )
			{


				a.children[1].classList.remove("active");

			}//end else

			a.children[1].innerHTML = '';
			a.children[1].innerHTML = 'JS 2';





			if( a.children[2].className.match(active) )
			{


				a.children[2].classList.remove("active");

			}//end else

			a.children[2].innerHTML = '';
			a.children[2].innerHTML = 'JS 3';





			if( a.children[3].className.match(active) )
			{

				a.children[3].classList.remove("active");

			}//end else

			a.children[3].innerHTML = '';
			a.children[3].innerHTML = 'JS 4';
			
	
		}).fail(function(){
	
			console.log("Erro....");
	
		});//end ajax

	});//END on





	
});//END ready