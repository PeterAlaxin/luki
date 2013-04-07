<?php

require_once '../Config.php';
require_once('../Config/iniAdapter.php');

/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-02-23 at 21:54:50.
 */
class Luki_ConfigTest extends PHPUnit_Framework_TestCase {

	/**
	 * @var Luki_Config
	 */
	protected $object;
	protected $adapter;
	protected $file = '/var/projects/demo/data/config/config.ini';
	protected $fileTemp = '/var/projects/demo/data/config/configTemp.ini';
	protected $section = 'test';
	protected $sectionValues = array('val1' => 1, 'val2' => 'val2');
	protected $sectionValuesNew = array('val1' => 2, 'val2' => 'val2New');

	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->adapter = new Luki_Config_iniAdapter($this->file);
		$this->object = new Luki_Config($this->adapter);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		if(is_file($this->fileTemp)) {
			unlink($this->fileTemp);
		}
	}

	/**
	 * @covers Luki_Config::getConfiguration
	 * @covers Luki_Config::__construct
	 */
	public function testGetConfiguration()
	{
		$this->assertTrue(is_array($this->object->getConfiguration()));
	}

	/**
	 * @covers Luki_Config::getConfigurationFile
	 * @covers Luki_Config::__construct
	 */
	public function testGetConfigurationFile()
	{
		$this->assertEquals($this->object->getConfigurationFile(), $this->file);
	}

	/**
	 * @covers Luki_Config::addSection
	 */
	public function testAddSection()
	{
		$this->assertTrue($this->object->addSection($this->section));
	}

	/**
	 * @covers Luki_Config::addSection
	 */
	public function testAddSection1()
	{
		$this->assertTrue($this->object->addSection($this->section, $this->sectionValues));
	}

	/**
	 * @covers Luki_Config::addSection
	 */
	public function testAddSection2()
	{
		$this->object->addSection($this->section);
		$aSections = $this->object->getSections();
		$this->assertContains($this->section, $aSections);
	}

	/**
	 * @covers Luki_Config::addSection
	 */
	public function testAddSection3()
	{
		$this->assertFalse($this->object->addSection());
	}

	/**
	 * @covers Luki_Config::deleteSection
	 * @covers Luki_Config::_fillEmptySection
	 */
	public function testDeleteSection()
	{
		$this->object->addSection($this->section);
		$aSections = $this->object->getSections();
		$this->assertContains($this->section, $aSections);

		$this->object->deleteSection($this->section);
		$aSections = $this->object->getSections();
		$this->assertFalse(in_array($this->section, $aSections));
	}

	/**
	 * @covers Luki_Config::deleteSection
	 * @covers Luki_Config::_fillEmptySection
	 */
	public function testDeleteSection1()
	{
		$this->object->addSection($this->section, $this->sectionValues);
		$aSections = $this->object->getSections();
		$this->assertContains($this->section, $aSections);

		$this->object->deleteSection($this->section);
		$aSections = $this->object->getSections();
		$this->assertFalse(in_array($this->section, $aSections));
	}

	/**
	 * @covers Luki_Config::getSection
	 */
	public function testGetSection()
	{
		$this->object->addSection($this->section, $this->sectionValues);
		$aSection = $this->object->getSection($this->section);
		$this->assertTrue(is_array($aSection));
		$this->assertEquals($aSection, $this->sectionValues);
	}

	/**
	 * @covers Luki_Config::getSections
	 */
	public function testGetSections()
	{
		$this->assertTrue(is_array($this->object->getSections()));
	}

	/**
	 * @covers Luki_Config::addValue
	 * @covers Luki_Config::addSection
	 */
	public function testAddValue()
	{
		$this->assertFalse($this->object->addValue());
		
		$this->assertTrue($this->object->addValue($this->sectionValues));
		
		$this->assertTrue($this->object->addValue($this->sectionValues, $this->section));
		
		$this->assertTrue($this->object->addValue('val3', 'val3Val', $this->section));
	}

	/**
	 * @covers Luki_Config::deleteKey
	 */
	public function testDeleteKey()
	{
		$this->object->addValue('val3', 'val3Val', $this->section);
		$this->assertTrue($this->object->deleteKey('val3', $this->section));

		$this->assertFalse($this->object->deleteKey('val4', $this->section));
		
		$this->assertFalse($this->object->deleteKey('val4'));

		$this->object->addValue('val3', 'val3Val', $this->section);
		$this->object->setDefaultSection($this->section);
		$this->assertTrue($this->object->deleteKey('val3'));
	}

	/**
	 * @covers Luki_Config::getValue
	 */
	public function testGetValue()
	{
		$this->assertTrue($this->object->addValue($this->sectionValues, $this->section));
		$this->assertEquals($this->object->getValue('val1', $this->section), $this->sectionValues['val1']);
		
		$this->object->setDefaultSection($this->section);
		$this->assertEquals($this->object->getValue('val1'), $this->sectionValues['val1']);

		$this->assertNull($this->object->getValue());
	}

	/**
	 * @covers Luki_Config::setValue
	 * @covers Luki_Config::getValue
	 * @covers Luki_Config::setDefaultSection
	 */
	public function testSetValue()
	{
		$this->assertFalse($this->object->setValue());

		$this->object->addValue('val3', 'val3Val', $this->section);
		$this->assertTrue($this->object->setValue('val3', 'val3New', $this->section));
		$this->assertEquals($this->object->getValue('val3', $this->section), 'val3New');
	
		$this->object->setDefaultSection($this->section);
		$this->assertTrue($this->object->setValue('val3', 'val3New2'));
		$this->assertEquals($this->object->getValue('val3'), 'val3New2');
		$this->assertEquals($this->object->getValue('val3', $this->section), 'val3New2');
		
		$this->object->addValue($this->sectionValues);
		$this->assertTrue($this->object->setValue($this->sectionValuesNew));
		$this->assertEquals($this->object->getValue('val2'), $this->sectionValuesNew['val2']);		
	}

	/**
	 * @covers Luki_Config::setDefaultSection
	 * @covers Luki_Config::addSection
	 */
	public function testSetDefaultSection()
	{
		$this->object->addSection($this->section);
		$this->assertTrue($this->object->setDefaultSection($this->section));
	}

	/**
	 * @covers Luki_Config::getDefaultSection
	 * @covers Luki_Config::setDefaultSection
	 * @covers Luki_Config::addSection
	 */
	public function testGetDefaultSection()
	{
		$this->object->addSection($this->section);
		$this->object->setDefaultSection($this->section);
		$this->assertEquals($this->object->getDefaultSection(), $this->section);
	}

	/**
	 * @covers Luki_Config::Save
	 */
	public function testSave()
	{
		$this->assertTrue($this->object->Save($this->fileTemp));
		$this->assertTrue(is_file($this->fileTemp));
	}

}