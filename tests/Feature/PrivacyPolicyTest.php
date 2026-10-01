<?php
// privacy poliscy
it('privacy policy page',
function () {
        $response = $this->get('/privacy-policy');
        $response->assertStatus(200);
});
