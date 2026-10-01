<?php
// terms
it('term page',
function () {
        $response = $this->get('/terms');
        $response->assertStatus(200);
});
