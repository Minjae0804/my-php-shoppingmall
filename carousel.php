<!-- 캐러셀은 메인 및 메뉴 화면에만 배치하기 위해 main_top과 분리. -->
<!-- 캐러셀의 크기가 큰 데다, 굳이 없어도 되는 곳에 캐러셀이 존재하여 불편한 경우가 생겼으므로 분리하였음 -->

</div>
<div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="210000"
	style=" overflow: hidden; box-shadow: 0 2px 20px rgba(0, 0, 0, 0.25); "> <!-- border-bottom-left-radius: 40px; border-bottom-right-radius: 40px; -->
	<div class="carousel-indicators d-flex justify-content-end me-10">
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" aria-label="Slide 1"	class="active" aria-current="true"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 5"></button>
		<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5" aria-label="Slide 6"></button>
	</div>
	<div class="carousel-inner">
		<div class="carousel-item active" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/nightreign.mp4" type="video/mp4">
			</video>
			<!-- <img src="images/nightreign.png" class="d-block w-100" alt="..."> -->
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">밤이 깊어질 때, 우리는 깨어난다</h6></p>
				<a href="product.php?id=1"><h1 style="color: white; font-size: 60px;">ELDEN RING 밤의 통치자</h1></a>
			</div>
		</div>
		<div class="carousel-item" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/darksouls3.mp4" type="video/mp4">
			</video>
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">...이제 그저 잔불만이 남아있을 뿐.</h6></p>
				<a href="product.php?id=19"><h1 style="color: white; font-size: 60px;">Dark Souls III</h1></a>
			</div>
		</div>
		<div class="carousel-item" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/eldenring.mp4" type="video/mp4">
			</video>
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">빛바랜 자여, 일어나라</h6></p>
				<a href="product.php?id=24"><h1 style="color: white; font-size: 60px;">ELDEN RING</h1></a>
			</div>
		</div>
		<div class="carousel-item" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/bloodborne.mp4" type="video/mp4">
			</video>
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">야수 사냥의 밤이 시작된다</h6></p>
				<a href="product.php?id=17"><h1 style="color: white; font-size: 60px;">Bloodborne</h1></a>
			</div>
		</div>
		<div class="carousel-item" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/sekiro.mp4" type="video/mp4">
			</video>
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">외팔이 늑대, 전란에 숨어들다</h6></p>
				<a href="product.php?id=22"><h1 style="color: white; font-size: 60px;">SEKIRO: SHADOWS DIE TWICE</h1></a>
			</div>
		</div>
		<div class="carousel-item" style="height: 750px; position: relative;">
			<video class="d-block w-100" autoplay muted playsinline loop style="object-fit: cover; height: 100%;">
				<source src="images/armoredcore6.mp4" type="video/mp4">
			</video>
			<div class="black-overlay"></div>
			<div style="position: absolute; top: 0; width: 100%; height: 100px; background: linear-gradient(to top, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div style="position: absolute; bottom: 0; width: 100%; height: 200px; background: linear-gradient(to bottom, rgba(0,0,0,0), black); pointer-events: none; z-index: 2;"></div>
			<div class="carousel-caption d-none d-md-block text-end" style="position: absolute; bottom: 20px; right:250px; z-index: 2;">
				<p><h6 style="font-family: SCDream5; font-size: 20px;">불을 지펴라. 타고 남은 모든 것에</h6></p>
				<a href="product.php?id=53"><h1 style="color: white; font-size: 60px;">Armored Core VI: Fires of Rubicon</h1></a>
			</div>
		</div>
	</div>
	
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" style="display: none;" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
		<span class="carousel-control-next-icon" style="display: none;" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
</div>

<div class="container">
<!-- 캐러셀 끝 -->