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

/***abstract class ShapeDecorator****/
abstract class ShapeDecorator implements Shape {
	//object which we will decorate rect circle ...
	protected $decoratedShape;

	function __construct(Shape $decoratedShape) {
		$this->decoratedShape = $decoratedShape;
	}

	function draw(){
		$this->decoratedShape->draw();
	}
}


/***class ShapeFactory ****/
class RedShapeDecorator extends ShapeDecorator{
	function __construct(Shape $decoratedShape){
		parent::__construct($decoratedShape);
	}

/***3 of many Decorations Redcolored borders e.g***/
	private function setRedTopBorder(){
		echo "decor| TopBorder RED \n";
	}

	private function setRedLeftBorder(){
		echo "decor| LeftBorder RED \n";
	}

	private function setRedRightBorder(){
		echo "decor| RightBorder RED \n";
	}

	function draw(){
		$this->decoratedShape->draw();
		$this->setRedLeftBorder();
		$this->setRedRightBorder();
		$this->setRedTopBorder();
	}
}

/***Using***/

/***Usual circle***/
$circle = new Circle;
/***Usual circle drawing***/
$circle->draw();
/***Red colored circle***/
$circleRed = new RedShapeDecorator(new Circle);
/***Red colored circle drawing***/
$circleRed->draw();



