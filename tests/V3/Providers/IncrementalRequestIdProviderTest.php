<?php

use LightSideSoftware\NavApi\V3\Providers\IncrementalRequestIdProvider;

test('getting next request-id', function () {

    $provider = new IncrementalRequestIdProvider();

    expect($provider->nextRequestId())->toEqual('RID0000000001')
        ->and($provider->nextRequestId())->toEqual('RID0000000002');
});
