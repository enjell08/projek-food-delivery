<main id="main" class="main">


	<style>
		* {
			transition: background-color 300ms ease, color 300ms ease;
		}
		*:focus {
			background-color: rgba(255, 204, 102, .2);
			outline: none;
		}
		html, body {
			color: rgba(33, 37, 41, 1);
			font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
			font-size: 16px;
			margin: 0;
			padding: 0;
			background-color: #ffffff;
			text-rendering: optimizeLegibility;
		}
		header {
			background-color: #ffffff;
			padding: .5rem 0;
		}
		.menu {
			padding: .5rem 2rem;
		}
		header ul {
			border-bottom: 1px solid rgba(242, 242, 242, 1);
			list-style-type: none;
			margin: 0;
			overflow: hidden;
			padding: 0;
			text-align: right;
		}
		header li {
			display: inline-block;
		}
		header li a {
			color: rgba(102, 51, 0, .8);
			display: block;
			height: 44px;
			text-decoration: none;
		}
		header li.menu-item a {
			border-radius: 5px;
			margin: 5px 0;
			height: 38px;
			line-height: 36px;
			padding: .4rem .65rem;
			text-align: center;
			background-color: rgba(255, 204, 102, .2);
		}
		header li.menu-item a:hover,
		header li.menu-item a:focus {
			background-color: rgba(255, 153, 51, .8);
			color: white;
		}
		header .logo {
			float: left;
			height: 44px;
			padding: .4rem .5rem;
		}
		header .heroe {
			margin: 0 auto;
			max-width: 1100px;
			padding: 1rem 1.75rem 1.75rem 1.75rem;
			text-align: center;
		}
		header .heroe h1 {
			font-size: 2.5rem;
			font-weight: 600;
			color: #000080;
		}
		header .heroe h2 {
			font-size: 2.5rem;
			font-weight: 600;
			color: #000080;
		}
		section {
			margin: 0 auto;
			max-width: 1100px;
			padding: 2rem 1.75rem 3.5rem 1.75rem;
		}
		section h1 {
			margin-bottom: 2.5rem;
			color: #ffffff ;
		}
		footer {
			background-color: #ffffff ;
			text-align: center;
		}
		footer .environment {
			color: rgba(255, 255, 255, 1);
			padding: 2rem 1.75rem;
		}
		footer .copyrights {
			background-color: rgba(102, 51, 0, 1);
			color: rgba(255, 255, 255, 1);
			padding: .25rem 1.75rem;
		}
	</style>
</head>
<body>

<header>
	<div class="menu">
		<ul>
			<li class="menu-item"><a href="home/login">Login</a></li>
			<li class="menu-item"><a href="home/regis">Sign Up </a></li>
		</ul>
	</div>
	<div class="heroe">
		<h1>Welcome to Delicious Food</h1>
		<h2>Yuk Belanja!!</h2>
	</div>
</header>

<section id="menu">
	<h1>Our Menu</h1>
	<div style="display: flex; justify-content: space-between; gap: 1rem;">
		<div class="menu-item" style="flex: 1; text-align: center;">
			<a href = "<?= base_url('img/1731700658_64b1368cc5f1652718ae.jpg'); ?>"><img src="<?=  base_url('img/1731700658_64b1368cc5f1652718ae.jpg'); ?>" width="380px" >
		</div>
		<div class="menu-item" style="flex: 1; text-align: center;">
			<a href = "<?= base_url('img/strawberry-cheese-cake.png'); ?>"><img src="<?=  base_url('img/strawberry-cheese-cake.png'); ?>" width="380px" >
		</div>
		<div class="menu-item" style="flex: 1; text-align: center;">
			<a href = "<?= base_url('img/es-kopyor.png'); ?>"><img src="<?=  base_url('img/es-kopyor.png'); ?>" width="380px" >
		</div>
	</div>
</section>


<footer>
	<div class="environment">
		<p>Delicious Food</p>
	</div>
</footer>

</body>
</main>
