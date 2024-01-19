<?php

namespace Modules\Media\Http\Livewire\Tests\Unit\Card\Video;

use Modules\Media\Http\Livewire\Card\Video\Clip;
use Tests\TestCase;

/**
 * Class ClipTest.
 *
 * @covers \Modules\Media\Http\Livewire\Card\Video\Clip
 */
final class ClipTest extends TestCase
{
    private Clip $clip;

    /**
     * {@inheritdoc}
     */
    protected function setUp(): void
    {
        parent::setUp();

        /** @todo Correctly instantiate tested object to use it. */
        $this->clip = new Clip();
    }

    /**
     * {@inheritdoc}
     */
    protected function tearDown(): void
    {
        parent::tearDown();

        unset($this->clip);
    }

    public function testMount(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testRender(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testEditClip(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }

    public function testUpdateDataFromModal(): void
    {
        /** @todo This test is incomplete. */
        self::markTestIncomplete();
    }
}
