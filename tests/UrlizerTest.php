<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use ML\Inflector\Urlizer;

final class UrlizerTest extends TestCase
{
    /**
     * @dataProvider provideSlug
     */
    public function testSlug(string $string, string $expectedSlug)
    {
        $this->assertSame($expectedSlug, (string) Urlizer::urlize($string));
    }

    public static function provideSlug(): array
    {
        return [
            ['You & I', 'you-i'],
            ['email@example.com', 'email-example-com'],
            ['Dieser Wert sollte größer oder gleich', 'dieser-wert-sollte-groesser-oder-gleich'],
            ['Dieser Wert sollte größer oder gleich', 'dieser-wert-sollte-groesser-oder-gleich'],
            ['Wôrķšƥáçè ~~sèťtïñğš~~', 'works-ace-settings'],
            ['Wôrķšƥáçè ~~sèťtïñğš~~', 'works-ace-settings'],
            ['Sergio Pérez', 'sergio-perez']
        ];
    }

    /**
     * @dataProvider provideSeperatorSlug
     */
    public function testSlugWithSeperator(string $string, string $seperator, string $expectedSlug)
    {
        $this->assertSame($expectedSlug, (string) Urlizer::urlize($string, $seperator));
    }

    public static function provideSeperatorSlug(): array
    {
        return [
            ['A B C', '_', 'a_b_c'],
            ['This is a test', ' ', 'this is a test'],
        ];
    }
}