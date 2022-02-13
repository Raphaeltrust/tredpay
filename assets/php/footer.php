<div style="height:100px;">
</div>
<div class="footer-nav nav">
	<li class="nav-item">
	<a href="/dashboard">
	<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 5v2h-4V5h4M9 5v6H5V5h4m10 8v6h-4v-6h4M9 17v2H5v-2h4M21 3h-8v6h8V3zM11 3H3v10h8V3zm10 8h-8v10h8V11zm-10 4H3v6h8v-6z"/></svg>
	
	 <br>Dashboard 
	 </a>
	</li>
		<li class="nav-item">
		<a href="/sell">
		<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><rect fill="none" height="24" width="24" y="0"/><path d="M21,7l-9-5L3,7v10l9,5l9-5L21,7z M12,4.29l5.91,3.28L14.9,9.24C14.17,8.48,13.14,8,12,8S9.83,8.48,9.1,9.24L6.09,7.57 L12,4.29z M11,19.16l-6-3.33V9.26l3.13,1.74C8.04,11.31,8,11.65,8,12c0,1.86,1.27,3.43,3,3.87V19.16z M10,12c0-1.1,0.9-2,2-2 s2,0.9,2,2s-0.9,2-2,2S10,13.1,10,12z M13,19.16v-3.28c1.73-0.44,3-2.01,3-3.87c0-0.35-0.04-0.69-0.13-1.01L19,9.26l0,6.57L13,19.16 z"/></svg>
		
		<br>New Token
		</a>
		</li>
		<li class="nav-item">
		<a href="/buy">
		<svg xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><g><rect fill="none" height="24" width="24"/></g><g><g><ellipse cx="12" cy="12" rx="3" ry="5.74"/><path d="M7.5,12c0-0.97,0.23-4.16,3.03-6.5C9.75,5.19,8.9,5,8,5c-3.86,0-7,3.14-7,7s3.14,7,7,7c0.9,0,1.75-0.19,2.53-0.5 C7.73,16.16,7.5,12.97,7.5,12z"/><path d="M16,5c-0.9,0-1.75,0.19-2.53,0.5c2.8,2.34,3.03,5.53,3.03,6.5c0,0.97-0.23,4.16-3.03,6.5C14.25,18.81,15.1,19,16,19 c3.86,0,7-3.14,7-7S19.86,5,16,5z"/></g></g></svg>
		
		<br>Enter Token 
		</a>
		</li>
		<li class="nav-item" id="menu">
		<a href="#" >
		<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
		
		<br>Menu
		</a>
		</li>
		
</div>
<script>
			$("#menu").click(function(e){
				e.preventDefault();
  $(".navmenu").show(500);
});
$("#closemenu").click(function(e){
	
  $(".navmenu").hide(500);
});
</script>
<style>
.footer-nav{
width:100%;
height:60px;
background-color:#fff;
box-shadow:1px 1px 4px rgba(0,0,0,0.2);
paddinhg:5px;
position:fixed;
bottom:0;
left:0;
text-align:center;
z-index:10;
}
.footer-nav .nav-item{
width:25%;
color:#000;
padding-top:5px;
}
.footer-nav a{
color:#000;
}
</style>
<script src="https://unpkg.com/ripple-effects"></script>
		<script>
	/*	ripple(".card",{
		triggerExcept: "a.btn",
		});*/
		const sd = ripple("button, .footer-nav .nav-item",{
		opacity: 1,
		background: "rgba(0,0,0,0.1)"
		});
		</script>