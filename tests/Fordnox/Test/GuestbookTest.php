<?php
namespace Fordnox\Test;

class GuestbookTest extends DbTestCase
{
    protected $dataset = 'fixtures/guestbook.xml';

    public function testAddEntry()
    {
        $this->assertEquals(2, $this->getConnection()->getRowCount('guestbook'), "Pre-Condition");

        $guestbook = new \Fordnox\Guestbook();
        $guestbook->setPdo(self::$pdo);
        $guestbook->addEntry("suzy", "Hello world!");

        $this->assertEquals(3, $this->getConnection()->getRowCount('guestbook'), "Inserting failed");
    }
}