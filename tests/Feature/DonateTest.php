<?php
// donate
it('donate page',
function () {
        $response = $this->get('/donate');
        $response->assertStatus(200);
});
