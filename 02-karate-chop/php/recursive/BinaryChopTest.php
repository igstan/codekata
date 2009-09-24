<?php

require_once 'BinaryChop.php';


class BinaryChopTest extends PHPUnit_Framework_TestCase
{
    public function checkChop($expected, $needle, $haystack)
    {
        $this->assertEquals($expected, BinaryChop::chop($needle, $haystack));
    }

    public function testReturnsMinusOneWhenHaystackIsEmpty()
    {
        $this->checkChop(-1, 3, array());
    }

    /**
     * @dataProvider nonExistentElements
     */
    public function testReturnsMinusOneWhenElementDoesNotExistInHaystack1($needle, $haystack)
    {
        $this->checkChop(-1, $needle, $haystack);
    }

    public function nonExistentElements()
    {
        return array(
            array(3, array(1)),
            array(0, array(1, 3, 5)),
            array(2, array(1, 3, 5)),
            array(4, array(1, 3, 5)),
            array(6, array(1, 3, 5)),
        );
    }

    public function testReturnsZeroWhenElementExistsIntoAOneElementHaystack()
    {
        $this->checkChop(0, 1, array(1));
    }

    public function testReturnsZeroWhenElementIsFirstInHaystack()
    {
        $this->checkChop(0, 1, array(1, 3, 5));
    }

    public function testReturnsOneWhenElementIsSecondInTheHaystack()
    {
        $this->checkChop(1, 3, array(1, 3, 5));
    }

    public function testReturnsTwoWhenElementIsThirdInTheHaystack()
    {
        $this->checkChop(2, 5, array(1, 3, 5));
    }

    /**
     * @dataProvider fourElementHaystacks
     */
    public function testFourElementHaystacks($expected, $needle, $haystack)
    {
        return $this->checkChop($expected, $needle, $haystack);
    }

    function fourElementHaystacks()
    {
        return array(
            array(0,  1, array(1, 3, 5, 7)),
            array(1,  3, array(1, 3, 5, 7)),
            array(2,  5, array(1, 3, 5, 7)),
            array(3,  7, array(1, 3, 5, 7)),
            array(-1, 0, array(1, 3, 5, 7)),
            array(-1, 2, array(1, 3, 5, 7)),
            array(-1, 4, array(1, 3, 5, 7)),
            array(-1, 6, array(1, 3, 5, 7)),
            array(-1, 8, array(1, 3, 5, 7)),
        );
    }
}
