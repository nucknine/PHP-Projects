<?php
/* Подключение библиотек */
require "Slim/Slim.php";
require "NotORM.php";

/* Инициализация автозагрузчика */
\Slim\Slim::registerAutoloader();

/* Инициализация соединения с БД для NotORM */
$pdo = new PDO("sqlite:rest.db");
$db = new NotORM($pdo);

/* Создание экземпляра класса Slim */
$app = new \Slim\Slim();

/**
  *	Роутинг: определение методов, путей и действий
 */

/* Действие по-умолчанию */
$app->get("/", function() {
  echo "Something by default";
});

/* Выборка всех книг */
$app->get("/books/", function() use ($app, $db) {
  $books = [];
  foreach ($db->books() as $book) {
    $books[]  = [
      "id" => $book["id"],
      "title" => $book["title"],
      "author" => $book["author"],
      "summary" => $book["summary"]
    ];
  }
  $res = $app->response();
  $res["Content-Type"] = "application/json";
  echo json_encode($books);
});

/* Получение книги используя её идентификатор */
$app->get("/book/:id/", function ($id) use ($app, $db) {
  $res = $app->response();
  $res["Content-Type"] = "application/json";
  $book = $db->books()->where("id", $id);
  if ($data = $book->fetch()) {
    echo json_encode([
      "id" => $data["id"],
      "title" => $data["title"],
      "author" => $data["author"],
      "summary" => $data["summary"]
    ]);
  }else{
    echo json_encode([
      "status" => 1,
      "message" => "Book ID $id does not exist"
    ]);
  }
});

/* Добавление новой книги */
$app->post("/book/", function () use($app, $db) {
  $res = $app->response();
  $res["Content-Type"] = "application/json";
  $book = $app->request()->post();
  $result = $db->books->insert($book);
  echo json_encode(["id" => $result["id"]]);
});

/* Изменение данных книги используя её идентификатор */
$app->put("/book/:id/", function ($id) use ($app, $db) {
  $res = $app->response();
  $res["Content-Type"] = "application/json";
  $book = $db->books()->where("id", $id);
  if ($book->fetch()) {
    $post = $app->request()->put();
    $result = $book->update($post);
    echo json_encode([
      "status" => 1,
      "message" => "Book updated successfully"
    ]);
  }else{
    echo json_encode([
      "status" => 0,
      "message" => "Book id $id does not exist"
    ]);
  }
});

/* Удаление книги используя её идентификатор */
$app->delete("/book/:id/", function ($id) use($app, $db) {
  $res = $app->response();
  $res["Content-Type"] = "application/json";
  $book = $db->books()->where("id", $id);
  if ($book->fetch()) {
    $result = $book->delete();
    echo json_encode([
      "status" => 1,
      "message" => "Book deleted successfully"
    ]);
  }else{
    echo json_encode([
      "status" => 0,
      "message" => "Book id $id does not exist"
    ]);
  }
});

/* Запуск приложения */
$app->run();