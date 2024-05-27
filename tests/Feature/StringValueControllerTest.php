<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StringValueControllerTest extends TestCase
{

    public function testGetMaximunValueFunctionWithAaaaaa()
    {
        $data = ['input' => 'aaaaaa'];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => 12,
                 ]);
    }

    public function testGetMaximunValueFunctionWithAbcabcddd()
    {
        $data = ['input' => 'abcabcddd'];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(200)
                 ->assertJson([
                     'data' => 9,
                 ]);
    }

    public function testInputValidationWithEmptyValue()
    {
        $data = ['input' => ''];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('input');
    }

    public function testInputValidationWithStringSizeGreaterThan100000()
    {
        $data = ['input' => str_repeat('a', 100001)];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('input');
    }

    public function testInputValidationWithValueOutEnglishAlphabet()
    {
        $data = ['input' => 'abcdñaa'];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('input');
    }

    public function testInputValidationWithValueNoLowercase()
    {
        $data = ['input' => 'aTaa'];

        $response = $this->postJson('/api/string/max-value', $data);

        $response->assertStatus(422)
                 ->assertJsonValidationErrors('input');
    }

}
