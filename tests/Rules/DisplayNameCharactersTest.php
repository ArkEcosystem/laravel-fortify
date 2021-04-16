<?php

declare(strict_types=1);

use ARKEcosystem\Fortify\Rules\DisplayNameCharacters;

beforeEach(function (): void {
    $this->rule = new DisplayNameCharacters();
});

it('accepts name with regular characters', function ($name) {
    expect($this->rule->passes('name', $name))->toBeTrue();
})->with([
    'Elon Tusk',
    'Rick Astley',
    'Los Pollos Hermanos',
    'Alix',
    'H4nn3 Andersen',
    'Hans',
    'Michel The 3rd',
    '3llo',
]);

it('accepts name with unicode characters', function ($name) {
    expect($this->rule->passes('name', $name))->toBeTrue();
})->with([
    'André Svenson',
    'John Elkjærd',
    'X Æ A-12',
    'Ñoño',
    'François Hollande',
    'Jean-François d\'Abiguäel',
    'Jean-François d’Abiguäel',
    'Père Noël',
    'Alfonso & sons',
    'Coca.Cola',
    'Procter, Cremin and Crist',
]);

it('accepts name with single quote', function () {
    expect($this->rule->passes('name', 'Marco d\'Almeida'))->toBeTrue();
});

it('doesnt accept other special characters', function ($name) {
    expect($this->rule->passes('name', $name))->toBeFalse();
})->with([
    'Martin Henriksen!',
    '@alfonsobries',
    'php=cool',
    '🤓', // EMOJI
    '¯', // MACRON
    '­', // SOFT HYPHEN
    '–', // EN DASH
    '‑', // NON-BREAKING HYPHEN
    '—', // EM DASH
    '_', // UNDERSCORE
]);

it('doesnt accept repetitive characters', function ($name) {
    expect($this->rule->passes('name', $name))->toBeFalse();
})->with([
    'Marco d\'\'Almeida',
    'Marco d’’Almeida',
    'Alfonso && sons',
    'Jean--François',
    'Coca..Cola',
    'Procter,, Cremin and Crist',
]);

it('has a message', function () {
    expect($this->rule->message())
        ->toBe(trans('fortify::validation.messages.some_special_characters'));
});
