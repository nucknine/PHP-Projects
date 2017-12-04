<section class="features">
			<div class="container">
				<div class="features-item">
					<div class="features-icon features-icon-schedule"></div>
                    <h2 class="features-title"><b>Гибкий график обучения</b></h2>
					<p>Современный темп жизни требует гибкого подхода к расписанию.</p>
				</div>

				<div class="features-item">
					<div class="features-icon features-icon-practice"></div>
                    <h2 class="features-title"><b>Практические занятия</b></h2>
					<p>На одной теории далеко не уедешь поэтому мы обучаем на практике.</p>
				</div>

				<div class="features-item">
					<div class="features-icon features-icon-work"></div>
                    <h2 class="features-title"><b>Не оставим без работы</b></h2>
					<p>Хорошие специалисты всегда в цене и Вы станете именно таким.</p>
				</div>
			</div>
		</section>

      <section class="schedule">
          <div class="container">
              <h2 class="schedule-title">Формы обучения</h2>
              <table class="schedule-table">
                  <thead>
                  <tr>
                      <td>
                          Название
                      </td>
                      <td>
                        Длительность
                      </td>
                      <td>
                        Описание
                      </td>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>
                          <strong>Дневное обучение</strong>
                      </td>
                      <td>
                          <strong>4 года</strong>
                      </td>
                      <td>
                        Наиболее интенсивный вариант обучения, для тех, кто не терпит компромиссов ни в чем.
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <strong>Вечернее обучение</strong>
                      </td>
                      <td>
                          <strong>5 лет</strong>
                      </td>
                      <td>
                        Вынуждены совмещать учебу с работой? Дадим вам такую возможность, совмещайте на здоровье.
                      </td>
                  </tr>
                  </tbody>
              </table>
          </div>

      </section>

      <section class="contacts">
			<div class="container">
				<h2 class="contacts-title">Обратная связь</h2>
				<form class="contacts-form" action="<?=$_SERVER['PHP_SELF']?>" method="post">
					<table>
						<tr>
							<td class="title">
							<label for="fullname">ФИО:</label>
							</td>
							<td class="field">
							<input type="text" id="fullname" name="name" value="<?=$name?>" placeholder="Представьтесь, пожалуйста">
							</td>
						</tr>

						<tr>
							<td class="title">
							<label for="email">Ваш EMail:</label>
							</td>
							<td class="field">
							<input type="text" id="email" name="email" value="<?=$email?>" placeholder="Введите ваш EMAIL">
							</td>
						</tr>

						<tr>
							<td class="title">
							<label for="message">Доп.текст:</label>
							</td>
							<td class="field">
							<textarea id="message" name="msg" placeholder="Сообщите все, что считаете нужным"><?=$msg?></textarea>
							</td>
						</tr>

						<tr>
							<td class="title"></td>
							<td class="field">
							<input type="submit" class="btn btn-prpl" value="Отправить">
							</td>
						</tr>
					</table>
				</form>
				<div class="contacts-instruction">
					<h3>Заинтересовались обучением на нашей кафедре?</h3>
					<p>Заполните короткую форму обратной связи и отправьте нам.</p>
					<p>Мы подготовим для вас индивидуальное предложение и выйдем на связь!</p>
					<p class="contacts-alert"><strong>Внимание!</strong> Все поля обязательны для заполнения.</p>
				</div>
			</div>
		</section>