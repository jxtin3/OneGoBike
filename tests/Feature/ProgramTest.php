<?php
// programs page == what we do page
it('what we do',
function () {
        $response = $this->get('/programs');
    $response->assertRedirect('what-we-do');
});
