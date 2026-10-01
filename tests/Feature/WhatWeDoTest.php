<?php
// what we do 
it('what we do page',
function () {
        $response = $this->get('/what-we-do');
        $response->assertStatus(200);
});
