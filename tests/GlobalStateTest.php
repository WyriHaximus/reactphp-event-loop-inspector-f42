<?php declare(strict_types=1);

namespace WyriHaximus\React\Tests\Inspector\F42;

use PHPUnit\Framework\TestCase;
use WyriHaximus\React\Inspector\F42\GlobalState;

final class GlobalStateTest extends TestCase
{
    public function testGlobalState()
    {
        self::assertSame(GlobalState::DEFAULT_STATE,GlobalState::get());
        GlobalState::set('key', 1);
        self::assertSame(['read' => 0, 'write' => 0, 'key' => 1],GlobalState::get());
        GlobalState::incr('key');
        self::assertSame(['read' => 0, 'write' => 0, 'key' => 2],GlobalState::get());
        GlobalState::incr('key', 3);
        self::assertSame(['key' => 5],GlobalState::get());
        GlobalState::reset();
        self::assertSame(['read' => 0, 'write' => 0, 'key' => 0],GlobalState::get());
        GlobalState::incr('key', 3);
        self::assertSame(['read' => 0, 'write' => 0, 'key' => 3],GlobalState::get());
    }
}
