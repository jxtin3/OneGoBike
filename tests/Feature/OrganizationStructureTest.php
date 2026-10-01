<?php
// organization structure
it('org structure page',
function () {
        $response = $this->get('/org-structure');
        $response->assertStatus(200);
});
