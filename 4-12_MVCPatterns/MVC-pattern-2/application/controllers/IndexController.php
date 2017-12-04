<?php
class IndexController implements IController {
  public function indexAction() {
    $fc = FrontController::getInstance();
    /* Инициализация модели */
    $model = new FileModel();
    
    $model->name = "Guest";

    $output = $model->render(USER_DEFAULT_FILE);

    $fc->setBody($output);
  }
}
