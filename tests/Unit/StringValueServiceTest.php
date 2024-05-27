<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\StringValueService;

class StringValueServiceTest extends TestCase
{
    
    public function testCalculateMaxValueWithAaaaaa()
    {
        $service = new StringValueService();
        $input = 'aaaaaa';
        $result = $service->calculateMaxValue($input);

        $this->assertEquals(12, $result);
    }

    public function testCalculateMaxValueWithAbcabcddd ()
    {
        $service = new StringValueService();
        $input = 'abcabcddd';
        $result = $service->calculateMaxValue($input);

        $this->assertEquals(9, $result);
    }

    public function testCountOcurrencesSubstringAaInStringAaaaaa ()
    {
        $service = new StringValueService();
        $string = 'aaaaaa';
        $substring = 'aa';
        $result = $service->countOcurrencesSubstring($string, $substring);

        $this->assertEquals(5, $result);
    }
}
