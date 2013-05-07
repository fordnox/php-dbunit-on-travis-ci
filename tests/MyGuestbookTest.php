<?php

require_once "../src/Guestbook.php";
require_once dirname(__FILE__) . "/DbTestCase.php";
class GuestbookTest extends DbTestCase
{
    protected $dataset = 'fixtures/guestbook.xml';

    public function testAddEntry()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'), "Pre-Condition");

        $guestbook = new Guestbook();
        $guestbook->setPdo(self::$pdo);
        $guestbook->addEntry("suzy", "Hello world!");

        $this->assertEquals(3, $this->getConnection()->getRowCount('guestbook'), "Inserting failed");
    }
}