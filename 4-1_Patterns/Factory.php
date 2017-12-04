<?php
/***interface Shape***/
interface Shape{
	function draw();
}

/***Rectangle***/
class Rectangle implements Shape {
	function draw() {
		echo __METHOD__."\n";
	}
}

/***Circle***/
class Circle implements Shape {
	function draw() {
		echo __METHOD__."\n";
	}
}

/***Square***/
class Square implements Shape {
	function draw() {
		echo __METHOD__."\n";
	}
}

/***class ShapeFactory ****/
class ShapeFactory {
	/***функцию можно сделать статической и создавать через
	$c = ShapeFactory::getShape('c');
	***/
	function getShape($shapeType) {
		$shapeType = strToUpper($shapeType);
		try{
		switch($shapeType) {
			case "R" : return new Rectangle; break;
			case "C" : return new Circle; break;
			case "S" : return new Square; break;
			default : throw new Exception("$shapeType is wrong type!\n");
		}
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
}

/***Using***/
$ShapeFactory = new ShapeFactory;

/***Circle***/
$circle = $ShapeFactory->getShape('c');
$circle->draw();

/***Square***/
$square = $ShapeFactory->getShape('s');
$square->draw();

/***Rectangle***/
$rectangle = $ShapeFactory->getShape('r');
$rectangle->draw();

/***Exception***/
$err = $ShapeFactory->getShape('z');