<?php
// organization structure
it('replicate go bike page',
function () {
        $response = $this->get('/replicate-go-bike');
        $response->assertStatus(200);
});
