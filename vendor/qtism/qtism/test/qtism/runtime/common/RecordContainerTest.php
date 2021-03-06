<?php
require_once (dirname(__FILE__) . '/../../../QtiSmTestCase.php');

use qtism\common\datatypes\QtiString;
use qtism\common\datatypes\QtiInteger;
use qtism\common\enums\BaseType;
use qtism\data\state\Value;
use qtism\data\state\ValueCollection;
use qtism\runtime\common\RecordContainer;
use qtism\common\datatypes\QtiPoint;

class RecordContainerTest extends QtiSmTestCase {
	
	public function testValid() {
		$record = new RecordContainer();
		$this->assertInstanceOf('qtism\\runtime\\common\\RecordContainer', $record);
		
		$record = new RecordContainer(array('key1' => new QtiInteger(1), 'key2' => new QtiString('a string'), 'key3' => new QtiPoint(10, 10)));
		$this->assertEquals(3, count($record));
		$this->assertEquals($record['key1']->getValue(), 1);
		$this->assertEquals($record['key2']->getValue(), 'a string');
		$this->assertTrue($record['key3']->equals(new QtiPoint(10, 10)));
		$this->assertEquals(1, $record->occurences(new QtiInteger(1)));
		$this->assertEquals(1, $record->occurences(new QtiPoint(10, 10)));
	}
	
	public function testEquals() {
		$record1 = new RecordContainer(array('one' => new QtiInteger(1), 'two' => new QtiInteger(2)));
		$record2 = new RecordContainer(array('two' => new QtiInteger(2), 'one' => new QtiInteger(1)));
		$this->assertTrue($record1->equals($record2));
		$this->assertTrue($record2->equals($record1));
		
		$record3 = new RecordContainer(array('three' => new QtiInteger(3), 'four' => new QtiInteger(4)));
		$this->assertFalse($record1->equals($record3));
		$this->assertFalse($record3->equals($record1));
	}
	
	public function testInvalidInstantiationOne() {
		$this->setExpectedException('\\InvalidArgumentException');
		$record = new RecordContainer(array(new QtiInteger(1), new QtiInteger(2), new QtiInteger(3)));
	}
	
	public function testInvalidUseOne() {
		$this->setExpectedException('\\RuntimeException');
		$record = new RecordContainer();
		$record[] = new QtiString('string');
	}
	
	public function testInvalidUseTwo() {
		$this->setExpectedException('\\RuntimeException');
		$record = new RecordContainer();
		$record[111] = new QtiString('string');
	}
	
	public function testInvalidUseThree() {
		$this->setExpectedException('\\InvalidArgumentException');
		// try with a datatype not supported by the QTI Runtime Model.
		$record = new RecordContainer();
		$record['document'] = new DOMDocument();
	}
	
	public function testCreateFromDataModel() {
		$valueCollection = new ValueCollection();
		
		$value = new Value(15, BaseType::INTEGER);
		$value->setPartOfRecord(true);
		$value->setFieldIdentifier("val1");
		$valueCollection[] = $value;
		
		$value = new Value('string', BaseType::STRING);
		$value->setPartOfRecord(true);
		$value->setFieldIdentifier("val2");
		$valueCollection[] = $value;
		
		$record = RecordContainer::createFromDataModel($valueCollection);
		$this->assertInstanceOf('qtism\\runtime\\common\\RecordContainer', $record);
		$this->assertEquals(2, count($record));
		$this->assertEquals(15, $record['val1']->getValue());
		$this->assertEquals('string', $record['val2']->getValue());
	}
	
	public function testCreateFromDataModelNoFieldIdentifier() {
		$valueCollection = new ValueCollection();
		
		$value = new Value(15, BaseType::INTEGER);
		$value->setPartOfRecord(true);
		$valueCollection[] = $value;
		
		$this->setExpectedException('\\InvalidArgumentException');
		$record = RecordContainer::createFromDataModel($valueCollection);
	}
}
