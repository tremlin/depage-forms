<?php

use depage\htmlform\elements\email;

class emailTest extends PHPUnit_Framework_TestCase {
    public function setUp() {
        $this->form     = new nameTestForm;
        $this->email    = new email('emailName', array(), $this->form);
    }

    public function testEmailSetValue() {
        $this->assertEquals($this->email->getName(), 'emailName');

        $this->email->setValue('valueString');
        $this->assertEquals($this->email->getValue(), 'valueString');
    }

    public function testEmailNotRequiredEmpty() {
        $this->email->setValue('');
        $this->assertEquals($this->email->validate(), true);
    }

    public function testEmailValidNotRequiredNotEmpty() {
        $this->email->setValue('mail@depage.com');
        $this->assertEquals($this->email->validate(), true);
    }

    public function testEmailInvalidNotRequired() {
        $this->email->setValue('valueString');
        $this->assertEquals($this->email->validate(), false);
    }

    public function testEmailRequiredEmpty() {
        $this->email->setRequired();
        $this->email->setValue('');
        $this->assertEquals($this->email->validate(), false);
    }
}