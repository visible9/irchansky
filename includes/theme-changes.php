<script type="text/javascript">
	window.addEventListener("load", getReadyToLazyLoad);
	window.addEventListener("scroll", getReadyToLazyLoad);

	function getReadyToLazyLoad(){
	  var imagesArray = document.querySelectorAll('img, iframe, .lazyload');
	  imagesArray.forEach((item)=>{
	    var imageOffset = item.getBoundingClientRect().top - window.innerHeight;
	    if(item.hasAttribute("data-url")){ 
	      if(imageOffset <= 150){
	        var attrbs = item.getAttribute('data-url');
	        item.setAttribute("src", attrbs);
	        item.removeAttribute('data-url');
	        return;
	      }
	    }else if(item.hasAttribute("data-bg-img")){
	      if(imageOffset <= 150){
	        var attrbs = item.getAttribute('data-bg-img');
	        item.setAttribute("style", `background-image: url('${attrbs}')`);
	        item.removeAttribute('data-bg-img');
	        return;
	      }
	    }
	  });
	}
</script>

<script>
	window.addEventListener("load", runAnimations);
	window.addEventListener("scroll", runAnimations);
	
	function runAnimations(){
		let animatedItems = document.querySelectorAll(".fade-in, .fade-from-left, .fade-from-right, .fade-from-bottom");
		animatedItems.forEach((item)=>{
			let top = item.getBoundingClientRect().top;
			if(top < (.85 * window.innerHeight)){
				item.classList.add("active");
			}
		});
	}
	
</script>

<script>
	// Close the mobile menu when any link inside it is clicked
	document.addEventListener("click", (event)=>{
		let menuLink = event.target.closest(".inner-masthead nav a");
		if(!menuLink){ return; }
		let mobileInput = document.getElementById("mobile-input");
		if(mobileInput){ mobileInput.checked = false; }
	});
</script>
