
<!-- header.inc -->
<header class="main-header">
			<div class="container">
				<div class="header-top">
					<div class="logo">
					<img src="img/logo.png" width="182px" height="82px" alt="A+">
					</div>

					<nav class="main-menu">
				        <?
							if(!drawMenu($leftMenu))
							trigger_error(ERR_DRAW_MENU, E_USER_WARNING);
						?>
					</nav>
				</div>

				<div class="promo">
					<div class="promo-title"><?=$header?></div>
					<p>
						<?php
						if(visitCounter == 1) {
							echo "Вы зашли к нам в первый раз";
						} else {
							echo "Вы зашли к нам в $visitCounter раз(а), последнее посещение было: $lastVisit";
						}
						?>
					</p>
					<p><?=$title?></p>
					<a href="#" class="btn btn-prpl">Подать заявку</a>
				</div>
			</div>
		</header>