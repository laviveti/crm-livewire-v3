<?php

test('globals', function () {
    expect(['dd', 'dump', 'ray', 'ds'])
        ->not->toBeUsed();
});
