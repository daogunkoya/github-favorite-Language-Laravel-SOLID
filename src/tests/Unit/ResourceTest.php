<?php

namespace Tests\Unit;

use App\Services\Resource\Resource;
use Tests\TestCase;

class ResourceTest extends TestCase
{
    public $data = [[
        'language' => 'PHP',
    ], [
        'language' => 'JavaScript',
    ],
        [
            'language' => 'JavaScript',
        ]];
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testGetLanguageReturnArray()
    {
     
        $resource = new Resource();
        $result = $resource->getLanguage($this->data);
        $this->assertEquals($result, ['PHP' => 1, 'JavaScript' => 2]);
    }

    public function testfavLanguage()
    {
        $resource = new Resource();
        $languages = $resource->getLanguage($this->data);
        $favorite = $resource->favLanguage();
        $this->assertEquals($favorite,[0 => 'JavaScript']);
    }
}
